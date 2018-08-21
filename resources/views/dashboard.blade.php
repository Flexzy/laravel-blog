@extends('layouts.base')

@section('content')
<br/>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary">Create post</a><br>
                    <h3>Your blog posts</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th colspan="3">Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($posts) > 0)
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                                        <td>
                                            {!!Form::open(['action' => ['PostsController@destroy', $post->id],'method' => 'POST'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="3"><div class="alert alert-info">You have no posts</div></th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
