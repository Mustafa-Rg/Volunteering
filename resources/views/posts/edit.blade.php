@extends('layouts.post-app')

    @section('title') Edit @endsection
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
        @method('PUT')
            <div class="mx-5">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}" id="title" autofocus placeholder="Add the post's title">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" name="city" class="form-control" value="{{$post->city}}" id="city" placeholder="City">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" name="category" class="form-control" value="{{$post->category}}" id="category" placeholder="City">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3">{{$post->description}}</textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        <form>
    @endsection  