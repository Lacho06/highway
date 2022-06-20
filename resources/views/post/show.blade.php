@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <div class="mt-3"></div>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <h2>{{$post->title}}</h2>
            <p>{{$post->text}}</p>
            <div class="d-flex col-12">
                <div class="col-6">
                    <img class="w-100" src="{{Storage::url($post->image->url)}}" alt="{{$post->title}}">
                </div>
                <div class="col-6">
                    <h3>Options</h3>
                    <x-adminlte-button label="Update" id="btn-modal" theme="success" />
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <!-- TODO: cuando ejecute npm run dev quitar el cdn -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('customMessage') == 'Deleted')
        <script>
            Swal.fire(
                'Deleted!',
                'Your image has been deleted.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'Image saved')
        <script>
            Swal.fire(
                'Saved!',
                'Your image has been saved.',
                'success'
            )
        </script>
    @endif
    <script>

        const btnModal = document.getElementById('btn-modal');
        btnModal.addEventListener('click', function(e){

            Swal.fire({
                title: 'Select a image',
                html: `    {!! Form::open(['route' => 'post.updateImage', 'id' => 'form', 'files' => true]) !!}
                            <x-adminlte-input-file id="post_image" name="post_image" igroup-size="sm" placeholder="Choose a image...">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-lightblue">
                                        <i class="fas fa-upload"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input-file>
                            {!! Form::hidden('post', $post->id) !!}
                            <x-adminlte-button label="Confirm" type="submit" theme="success" class="d-none" icon="fas fa-key"/>
                            {!! Form::close() !!}`,
                confirmButtonText: 'Send',
                focusConfirm: false,
                preConfirm: () => {
                    const form = Swal.getPopup().querySelector('#form')
                    const post_image = Swal.getPopup().querySelector('#post_image')
                    if (!post_image.value) {
                        Swal.showValidationMessage(`Please enter a image`)
                    }else{
                        form.submit();
                    }
                }
            })
        })


    </script>
@stop
