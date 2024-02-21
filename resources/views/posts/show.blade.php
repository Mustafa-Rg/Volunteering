<?php
    use Illuminate\Support\Facades\Auth;
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
                <h5 class="card-title">Name: {{ Auth::user()->name }}</h5>
                <p class="card-text">Email: {{ Auth::user()->email }}</p>
                <p class="card-text">Created at: {{Auth::user()->created_at}}</p>
            </div>
        </div>
    @endsection  