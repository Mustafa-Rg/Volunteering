<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {

        // $posts = Post::orderBy('id', 'DESC')->paginate(4); // Select * from posts
        $posts = Post::latest()->take(4)->get();
        $userType = auth()->user()->user_type;

        if ($userType === 'volunteer') {
            return view('posts.vol-index', ['posts' => $posts]);
        } elseif ($userType === 'organization') {
            return view('posts.index', ['posts' => $posts]);
        } else {
            // Handle other user types or show an error view
            return abort(403, 'Unauthorized');
        }
    }

    public function show(Post $post) {

        return view('posts.show', ['post' => $post]);

    }

    public function create() {
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }

    public function store(Request $request) {
        
        $request->validate([
            'title' => ['required', 'max:20'],
            'city' => ['required','max:20'],
            'category' => ['required','max:20'],
            'description' => ['required', 'min:10', 'max:120'],
        ]);

        $title = $request->title;
        $city = $request->city;
        $category = $request->category;
        $description = $request->description;
        $postBy = auth()->user()->id;

        Post::create([
            'title' => $title,
            'city' => $city,
            'category' => $category,
            'description' => $description,
            'user_id' => $postBy,
        ]);

        return to_route('posts.index');
    }

    public function edit(Post $post) {

        $users = User::all();

        return view('posts.edit', ['users' => $users, 'post' => $post]);

    }

    public function update($postId) {

        // Validate user input
        $request = request();
        $request->validate([
            'title' => ['required','max:20'],
            'city' => ['required','max:20'],
            'category' => ['required','max:20'],
            'description' => ['required', 'min:10', 'max:120'],
        ]);
        // Get the data the user provide
        $title = $request->title;
        $city = $request->city;
        $category = $request->category;
        $description = $request->description;
        $postsBy = $request->post_creator;
        
        // Update the post
        $post = Post::findOrFail($postId);
        $post->update([
            'title' => $title,
            'city' => $city,
            'category' => $category,
            'description' => $description,
        ]);

        // Shwo the page after updating
        return to_route('posts.show', $postId);

    }

    public function destroy(Post $post) {

        $post->delete();
        return to_route('posts.index');
    }

    public function search(Request $request) {

        $request->validate([
            'keyword' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
        ]);
        
        $searchKeyword = htmlspecialchars(strip_tags($request->keyword));
        $city = $request->city;
        // Handle the case when the input is empty,return all posts
        if (empty($searchKeyword) && empty($city)) {
            $posts = Post::all();
        } else if (empty($city)){
            // Show only the posts that match the searching keyword
            $posts = Post::where('description', 'like', "%$searchKeyword%")->get();
        } else if (empty($searchKeyword)){
            // Show only the posts that match the searching keyword
            $posts = Post::where('city', 'like', "%$city%")->get();
        } else {
            // Show only the posts that match the searching keyword
            $posts = Post::where('description', 'like', "%$searchKeyword%")
                            ->where('city', 'like', "%$city%")
                            ->get();
        }

        return view('posts.search-results', ['posts' => $posts]);
    }
}