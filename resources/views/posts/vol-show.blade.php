<?php
    use Illuminate\Support\Facades\Auth;
    use App\Models\Organization;

    $organization = Organization::with('user')->find($post->organization_id);

?>
@extends('layouts.post-app')

    @section('title') index @endsection

    @section('content')
        <div class="card">
            <div class="card-header">
                Post Info
            </div>
            <div class="card-body">
                <h5 class="card-title">Title: {{$post->title}}</h5>
                <h5 class="card-title">City: {{$post->city}}</h5>
                <h5 class="card-title">Category: {{$post->category}}</h5>
                <h5 class="card-title">Hours: {{$post->hours_of_volunteering}}</h5>
                <p class="card-text">{{$post->description}}</p>
            </div>
        </div>   
        <div class="card mt-4">
            <div class="card-header">
                Post Created Info
            </div>
            <div class="card-body">
                <h5 class="card-title">Name: {{ $organization->user->name }}</h5>
                <p class="card-text">Email: {{ $organization->user->email }}</p>
                <p class="card-text">Created at: {{Auth::user()->created_at}}</p>
            </div>
        </div>

          <!-- Apply to the post -->
    <div class="mx-3 mt-3">
        <button id="applyButton" class="btn btn-success">Apply</button>

        <form id="applicationForm" method="POST" action="{{route('posts.submit')}}" style="display: none;">
            @csrf
            <div class="form-group mt-3">
                <label for="brief">Why do you want to apply for this post?</label>
                <textarea class="form-control" id="brief" name="brief" rows="3" required></textarea>
                <input type="hidden" name="post_id" class="form-control" id="post_id" autofocus  value="{{$post->id}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
    </div>

    <script>
        document.getElementById('applyButton').addEventListener('click', function() {
            document.getElementById('applyButton').style.display = 'none';
            document.getElementById('applicationForm').style.display = 'block';
        });
    </script>
    @endsection  