@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')

    <div class="mt-3"></div>

@stop
@section('content')

    <div class="card card-success">
        <div class="card-header">
            <h2>Edit Plan</h2>
        </div>
        <div class="card-body">
            {!! Form::model($plan, ['route' => ['plan.update', $plan], 'files' => true, 'method' => 'put', 'class' => '']) !!}

                <x-adminlte-input name="name" enable-old-support placeholder="Name"/>
                <x-adminlte-input name="price" enable-old-support placeholder="Price"/>
                <x-adminlte-input-file name="cover_image" igroup-size="sm" placeholder="Choose a file...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-lightblue">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
                <x-adminlte-button label="Update" type="submit" theme="success" icon="fas fa-key"/>
            {!! Form::close() !!}

        </div>
    </div>

@stop
