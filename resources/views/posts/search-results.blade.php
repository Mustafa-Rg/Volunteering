
<!--Show posts-->
@foreach($posts as $post)
    @if (auth()->user()->user_type === 'organisation')
        @component('components.post-component', ['post' => $post])@endcomponent
    @else
        @component('components.vol-post-component', ['post' => $post])@endcomponent
    @endif
    
@endforeach