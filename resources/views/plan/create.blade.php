@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <div class="mt-3"></div>
@stop
@section('content')

    <div class="card card-success">
        <div class="card-header">
            <h2>Create Plan</h2>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'plan.store', 'files' => true, 'class' => '']) !!}

                <x-adminlte-input name="name" enable-old-support placeholder="Name"/>
                <x-adminlte-input name="price" type="number" enable-old-support placeholder="Price"/>
                <x-adminlte-button label="Create" type="submit" theme="success" icon="fas fa-key"/>

            {!! Form::close() !!}
        </div>
    </div>



@stop
