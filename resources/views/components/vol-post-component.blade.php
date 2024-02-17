{{-- post components of Volunteers --}}

<tr>
    <th scope="row">{{ $post->id }}</th>
    <td>{{ $post->title }}</td>
    <td>{{ $post->city }}</td>
    <td>{{ $post->category }}</td>
    <td>{{ $post->user ? $post->user->name : 'Not found' }}</td>
    <td>{{ $post->created_at->format('Y-m-d') }}</td>
    <td>
        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View</a>
    </td>
</tr>