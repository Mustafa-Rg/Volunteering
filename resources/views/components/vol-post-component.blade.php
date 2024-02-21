{{-- post components of Volunteers --}}
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
    </td>
</tr>