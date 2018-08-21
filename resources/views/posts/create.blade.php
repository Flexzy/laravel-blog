@extends('layouts.base')

@section('content')
    <br/>
    <br/>
    <h1>Create Post</h1>
    @include('layouts.inc.messages')
    <div class="row">
        <div class="col-sm-7">
            {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('body', 'Body')}}
                    {{Form::textarea('body', old('body'), ['class' => 'form-control', 'placeholder' => 'Enter post content here', 'id' => 'article-ckeditor'])}}
                </div>
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection