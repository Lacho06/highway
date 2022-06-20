@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <div class="mt-1"></div>
@stop
@section('content')

    <div class="card card-success">
        <div class="card-header">
            <h2>Create Plan</h2>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'plan.store', 'class' => '']) !!}
                {!! Form::label('name', 'Name') !!}
                <small class="d-inline h6 text-danger">*</small>
                <x-adminlte-input name="name" enable-old-support placeholder="Name"/>
                {!! Form::label('price', 'Price') !!}
                <small class="d-inline h6 text-danger">*</small>
                <x-adminlte-input name="price" type="number" enable-old-support placeholder="Price"/>
                <x-adminlte-button label="Create" type="submit" theme="success" />
            {!! Form::close() !!}
        </div>
    </div>



@stop
