@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <div class="mt-3"></div>
@stop
@section('content')

    <div class="card card-success">
        <div class="card-header">
            <h2>Edit Card</h2>
        </div>
        <div class="card-body">
            {!! Form::model($card, ['route' => ['card.update', $card], 'method' => 'put', 'files' => true, 'class' => '']) !!}
                <x-adminlte-input name="title" enable-old-support value="{{$card->title}}" placeholder="Title" />
                <x-adminlte-input name="text" enable-old-support value="{{$card->text}}" placeholder="Text" />
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <x-adminlte-input-file id="input_image" name="cover_image" igroup-size="sm" placeholder="Choose a image...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-lightblue">
                                    <i class="fas fa-upload"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-file>
                        <x-adminlte-button class="mr-auto" label="Update" type="submit" theme="success" />
                    </div>
                    <img id="image" src="{{Storage::url($card->cover_image)}}" width="200" height="200" alt="Cover Image">
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
