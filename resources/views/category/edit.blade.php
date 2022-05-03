@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <x-adminlte-button label="Add Image" id="btn-modal" theme="info" icon="fas fa-key"/>
    <div class="mt-3"></div>

@stop
@section('content')

    <div class="card card-success">
        <div class="card-header">
            <h2>Edit Category</h2>
        </div>
        <div class="card-body">
            {!! Form::model($category, ['route' => ['category.update', $category], 'method' => 'put', 'files' => true, 'class' => '']) !!}

                <x-adminlte-input name="title" enable-old-support value="{{$category->title}}" placeholder="Title" />
                <x-adminlte-input name="subtitle" enable-old-support value="{{$category->subtitle}}" placeholder="Subtitle" />
                <div class="d-flex justify-content-between">
                    <x-adminlte-input-file id="input_image" name="cover_image" igroup-size="sm" placeholder="Choose a image...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-upload"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-file>
                    <img id="image" src="{{Storage::url($category->cover_image)}}" width="200" height="200" alt="Cover Image">
                </div>
                <x-adminlte-button label="Update" type="submit" theme="success" icon="fas fa-key"/>
            {!! Form::close() !!}
        </div>
    </div>

@stop
@section('js')
    <!-- TODO: cuando ejecute npm run dev quitar el cdn -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                html: `    {!! Form::open(['route' => 'category.addImage', 'id' => 'form', 'files' => true]) !!}
                            <x-adminlte-input-file id="category_image" name="category_image" igroup-size="sm" placeholder="Choose a image...">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-lightblue">
                                        <i class="fas fa-upload"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input-file>
                            {!! Form::hidden('category', $category->id) !!}
                            <x-adminlte-button label="Confirm" type="submit" theme="success" class="d-none" icon="fas fa-key"/>
                            {!! Form::close() !!}`,
                confirmButtonText: 'Send',
                focusConfirm: false,
                preConfirm: () => {
                    const form = Swal.getPopup().querySelector('#form')
                    const category_image = Swal.getPopup().querySelector('#category_image')
                    if (!category_image.value) {
                        Swal.showValidationMessage(`Please enter a image`)
                    }else{
                        form.submit();
                    }
                }
            })
        })


    </script>

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
