@extends('layouts.base')

@section('content')
    <br/>
    <br/>
    <br/>
    <h1>Services</h1>
    <ul class="list-group">
        @if(count($services) > 0)
            @foreach($services as $service)
                <li class="list-group-item">{{$service}}</li>
            @endforeach
        @endif
    </ul>
@endsection