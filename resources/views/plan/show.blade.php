@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <h2>Plans</h2>
@stop

@section('content')

    <h2>{{$plan->name}}</h2>
    <p>{{$plan->price}}</p>
@stop
