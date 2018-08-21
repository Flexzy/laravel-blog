@extends('layouts.base')

@section('content')
    <br/>
    <br/>
    <br>
    @if($post)
        <a href="/posts" class="btn btn-default">Go back</a>
        <h1>{{$post->title}}</h1>
        <div>
            {!!$post->body!!}
        </div>
        <hr>
        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
        <hr>
        @if(!Auth::guest())    
            @if(Auth::user()->id == $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                
                {!!Form::open(['action' => ['PostsController@destroy', $post->id],'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            @endif
        @endif
    @else
        <div class="alert alert-danger">
            No posts found
        </div>
    @endif

@endsection