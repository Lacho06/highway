@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')

    <div class="mt-3"></div>

@stop
@section('content')

    <div class="card card-success">
        <div class="card-header">
            <h2>Edit Post</h2>
        </div>
        <div class="card-body">
            {!! Form::model($post, ['route' => ['post.update', $post], 'files' => true, 'class' => '']) !!}

                <x-adminlte-input name="title" enable-old-support value="{{$post->title}}" placeholder="Title"/>
                <x-adminlte-textarea name="text" enable-old-support value="{{$post->text}}" placeholder="Insert text..."/>
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
