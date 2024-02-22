@extends('layouts.post-app')

    @section('title') Submit @endsection
    @section('content')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('posts.update', $post->id)}}" method="POST" autocomplete="off">
        @csrf
            <div class="mx-5">
                <div class="mb-3">
                    <label for="brief" class="form-label">Why you want to apply for this opportunity</label>
                    <textarea name="brief" class="form-control" id="brief" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        <form>
    @endsection 