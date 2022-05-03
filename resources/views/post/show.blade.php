@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <h2>Posts</h2>
@stop

@section('content')

    <h2>{{$post->title}}</h2>
    <p>{{$post->text}}</p>
@stop
