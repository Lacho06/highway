@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <div class="mt-1"></div>
@stop
@section('content')

    <div class="card card-success">
        <div class="card-header">
            <h2>Create Post</h2>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'post.store', 'files' => true, 'class' => '']) !!}
                {!! Form::label('title', 'Title') !!}
                <small class="d-inline h6 text-danger">*</small>
                <x-adminlte-input name="title" enable-old-support placeholder="Title"/>
                {!! Form::label('text', 'Text') !!}
                <small class="d-inline h6 text-danger">*</small>
                <x-adminlte-textarea name="text" enable-old-support placeholder="Insert text..."/>
                {!! Form::label('cover_image', 'Image') !!}
                <small class="d-inline h6 text-danger">*</small>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <x-adminlte-input-file id="input_image" name="cover_image" igroup-size="sm" placeholder="Choose a image...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-lightblue">
                                    <i class="fas fa-upload"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-file>
                        <x-adminlte-button class="mr-auto" label="Create" type="submit" theme="success" icon="fas fa-key"/>
                    </div>
                    <img id="image" src="" width="200" height="200" alt="Cover Image">
                </div>
            {!! Form::close() !!}

        </div>
    </div>



@stop
@section('js')

    <script>

        const input_image = document.getElementById('input_image')
        input_image.addEventListener('change', changeImage)

        function changeImage(e){
            const file = e.target.files[0]
            const reader = new FileReader()
            reader.onload = (e) => {
                document.getElementById('image').setAttribute('src', e.target.result)
            }
            reader.readAsDataURL(file)
        }

    </script>

@stop
