@extends('layouts.base')

@section('content')
    <br/>
    <br/>
    <h1>Posts</h1>
    
    @include('layouts.inc.messages')
    
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <div class="alert alert-danger">
            No posts found
        </div>
    @endif

@endsection