<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Application;

class PostController extends Controller
{
    public function index() {

        $user = User::find(auth()->user()->id);
        $posts = Post::query();

        //Show all of the posts if the user is a volunteer
        if ($user->user_type === 'volunteer') {
            $posts = Post::latest()->get();
            return view('posts.vol-index', ['posts' => $posts]);
        } elseif ($user->user_type  === 'organization') {
            // Show only the organizations's posts that loged in
            $organization_id = $user->organization->id;
            $posts = $posts->where('organization_id', $organization_id)->latest()->get();
            return view('posts.index', ['posts' => $posts]);
        } else {
            // Handle other user types or show an error view
            return abort(403, 'Unauthorized');
        }
    }

    public function show(Post $post) {

        $user = User::find(auth()->user()->id);

        //Show all of the posts if the user is a volunteer
        if ($user->user_type === 'volunteer') {
            return view('posts.vol-show', ['post' => $post]);
        } elseif ($user->user_type  === 'organization') {
            return view('posts.show', ['post' => $post]);
        } else {
            // Handle other user types or show an error view
            return abort(403, 'Unauthorized');
        }
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        // Validation of the user's inputs
        $request->validate([
            'title' => ['required', 'max:20'],
            'city' => ['required','max:20'],
            'category' => ['required','max:20'],
            'hours_of_volunteering' => ['required', 'numeric'],
            'description' => ['required', 'min:10', 'max:120'],
        ]);

        // Access the inputs of validations
        $user = Auth::user();
        $organization = $user->organization;
        $title = $request->title;
        $city = $request->city;
        $category = $request->category;
        $hours_of_volunteering = $request->hours_of_volunteering;
        $description = $request->description;
        $postBy = $user->name;
        $organization_id = $organization->id;

        // Create a post usign the user's inputs
        Post::create([
            'title' => $title,
            'city' => $city,
            'category' => $category,
            'hours_of_volunteering' => $hours_of_volunteering,
            'description' => $description,
            'user_id' => $postBy,
            'organization_id' => $organization_id,
        ]);

        // Redirct the user to the posts dashboard
        return to_route('posts.index');
    }

    public function edit(Post $post) {

        $users = User::all();

        return view('posts.edit', ['users' => $users, 'post' => $post]);

    }

    public function update($postId) {

        // Validate user's input
        $request = request();
        $request->validate([
            'title' => ['required','max:20'],
            'city' => ['required','max:20'],
            'category' => ['required','max:20'],
            'hours_of_volunteering' => ['required', 'number'],
            'description' => ['required', 'min:10', 'max:120'],
        ]);

        // Get the data the user provide
        $title = $request->title;
        $city = $request->city;
        $category = $request->category;
        $hours_of_volunteering = $request->hours_of_volunteering;
        $description = $request->description;
        $postsBy = $request->post_creator;
        
        // Update the post
        $post = Post::findOrFail($postId);
        $post->update([
            'title' => $title,
            'city' => $city,
            'category' => $category,
            'hours_of_volunteering' => $hours_of_volunteering,
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
            'category' => ['nullable', 'string'],
        ]);
    
        $searchKeyword = htmlspecialchars(strip_tags($request->keyword));
        $city = $request->city;
        $category = $request->category;
    
        $userType = auth()->user()->user_type;
    
        $posts = Post::query();
    
        // Add conditions for each parameter when not empty
        if (!empty($searchKeyword)) {
            $posts->where('description', 'like', "%$searchKeyword%");
        }
    
        if (!empty($city)) {
            $posts->where('city', 'like', "%$city%");
        }
    
        if (!empty($category)) {
            $posts->where('category', 'like', "%$category%");
        }
    
        // Filter posts based on user type
        if ($userType === 'organization') {
            $organizationId = auth()->user()->organization->id;
            $posts->where('organization_id', $organizationId);
        }
    
        // Get the results
        $resultPosts = $posts->latest()->get();
    
        return view('posts.search-results', ['posts' => $resultPosts]);
    }
    
    
    public function submitPost(Request $request) {
        // Validate the user input
        $request->validate([
            'brief' => ['required', 'min:10', 'max:120'],
            'post_id' => ['required', 'exists:posts,id'],
        ]);

        // Access the data of the application
        $volunteerId = User::find(Auth::id())->volunteer->id;
        $post_id = $request->post_id;
        $brief = $request->brief;

        // Create a new application record
        Application::create([
            'post_id' => $post_id,
            'volunteer_id' => $volunteerId,
            'brief' => $brief,
        ]);

        // Optionally, you can redirect the user after submitting the application
        return to_route('posts.index')->with('success', 'Application submitted successfully!');
    }

    public function showSubmissions(Post $post) {
       // Check thorw the application of the volunteers that submited to this post
       $volunteers = Application::where('post_id', $post->id)->get();
       
       return view('posts.submitions', ['volunteers' => $volunteers]);
    }
}