@extends('layouts.post-app')

    @section('title') Create @endsection

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
        <form action="{{route('posts.store')}}" method="post" autocomplete="off">
        @csrf
            <div class="mx-5">
                <div class="mb-3">
                    <label for="title" class="form-label" >Title</label>
                    <input type="text" name="title" class="form-control" id="title" autofocus  placeholder="Add the post's title" value="{{old('title')}}">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label" >City</label>
                    <input type="text" name="city" class="form-control" id="city"  placeholder="Add the city" value="{{old('city')}}">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label" >Category</label>
                    <input type="text" name="category" class="form-control" id="category"   placeholder="Add the post's category" value="{{old('category')}}">
                </div>
                <div class="mb-3">
                    <label for="hours_of_volunteering" class="form-label" >Hours of Volunteering</label>
                    <input type="number" name="hours_of_volunteering" class="form-control" id="hours_of_volunteering" placeholder="Add the hours of volunteering" value="{{old('hours_of_volunteering')}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label" >Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3" value="{{old('description')}}"></textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </div>
        <form>
    @endsection  