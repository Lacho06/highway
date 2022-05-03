@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <x-adminlte-button label="Add Image" id="btn-modal" theme="info" icon="fas fa-key"/>
    <div class="mt-3"></div>
@stop

@section('content')

    @php
        $heads = [
            'ID',
            'Image',
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];
    @endphp

    <div class="row">
        <div class="col-12 d-flex flex-column">
            <h2>{{$category->title}}</h2>
            <p>{{$category->subtitle}}</p>
            <div class="d-flex col-12">
                <div class="col-4">
                    <img width="300" height="300" src="{{Storage::url($category->cover_image)}}" alt="{{$category->title}}">
                </div>
                <div class="col-8">
                    <h3>Related images</h3>

                    <x-adminlte-datatable id="table1" :heads="$heads">
                        @foreach($category->images as $image)
                            <tr>
                                <td>{{$image->id}}</td>
                                <td>
                                    <img src="{{Storage::url($image->url)}}" width="50" height="50" alt="" />
                                </td>
                                <td>
                                    <nobr>
                                        <form action="{{route('category.deleteImage', $image)}}" method="post" class="d-inline form-delete">
                                            @csrf @method("DELETE")
                                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" id="btn-delete" title="Delete">
                                                <i class="fa fa-lg fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    </nobr>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>

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
        $('.form-delete').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });

    </script>
@stop
