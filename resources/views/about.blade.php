@extends('layout.master')

@section('content')
<center>
    <pre>
        <h1>about us page</h1>
        @if($obj->name == 'mo')
        <p>yes i'm {{$obj->name}}</p>
        @else
        <p>no i'm not {{$obj->name}}</p>
        @endif
        <p>{{$obj->department}}</p>
        <p>{{$obj->level}}</p>
    </pre>
</center>

@stop
