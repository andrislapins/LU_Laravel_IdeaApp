@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        {{-- Search field --}}
        <form action="/search" method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            <div>
        <form>
        <div style="margin-left:10px;">
            <a href="/returnall" type="button" class="btn btn-primary">Return All</a>
        </div>
        <div style="margin-left:10px;">
            <a href="/posts/create" class="btn btn-primary">Create Post</a>
        </div>
    </div>
    <div class="jumbotron"> 
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
    </div>
@endsection