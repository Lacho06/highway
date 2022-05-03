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

                <x-adminlte-input name="title" enable-old-support placeholder="Title"/>
                <x-adminlte-input name="subtitle" enable-old-support placeholder="Subtitle"/>
                <x-adminlte-input-file name="cover_image" igroup-size="sm" placeholder="Choose a file...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-lightblue">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
                <x-adminlte-button label="Create" type="submit" theme="success" icon="fas fa-key"/>

            {!! Form::close() !!}
        </div>
    </div>



@stop
