{{-- post components of organizations --}}

<?php
    use Illuminate\Support\Facades\Auth;
?>

<tr>
    <th scope="row">{{ $post->id }}</th>
    <td>{{ $post->title }}</td>
    <td>{{ $post->city }}</td>
    <td>{{ $post->category }}</td>
    <td>{{ $post->hours_of_volunteering }}</td>
    <td>{{ Auth::user()->name}}</td>
    <td>{{ $post->created_at->format('Y-m-d') }}</td>
    <td>
        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View</a>

        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
        <form style="display: inline;" action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to Delete the post?')">Delete</button>
        </form>
    </td>
</tr>