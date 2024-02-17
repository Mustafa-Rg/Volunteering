
<!--Show posts-->
@if(auth()->user()->user_type == 'volunteer')
    @foreach($posts as $post)
        @component('components.vol-post-component', ['post' => $post])@endcomponent
    @endforeach
@else
    @foreach($posts as $post)
        @component('components.post-component', ['post' => $post])@endcomponent
    @endforeach
@endif