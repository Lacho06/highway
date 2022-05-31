@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <h2>Categories</h2>
@stop

@section('content')

    @php
        $heads = [
            'ID',
            'Title',
            ['label' => 'Subtitle', 'width' => 40],
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];
    @endphp
    <div class="d-flex justify-content-between my-3">
        <div>
            {{$categories->links()}}
        </div>
        <x-adminlte-button id="btnDeleteAllCategories" label="Delete All Categories" theme="danger" />
        <form action="{{route('category.deleteAll')}}" method="post" class="d-none form-deleteAllCategories">
            @csrf @method("DELETE")
            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" id="btn-delete" title="Delete All">
                <i class="fa fa-lg fa-fw fa-trash"></i>
            </button>
        </form>
    </div>
    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>{{$category->subtitle}}</td>
                <td>
                    <nobr>
                        <a href="{{route('category.edit', $category)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <form action="{{route('category.destroy', $category)}}" method="post" class="d-inline form-delete">
                            @csrf @method("DELETE")
                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" id="btn-delete" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{route('category.show', $category->id)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>
                    </nobr>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

@stop

@section('js')
    <!-- TODO: cuando ejecute npm run dev quitar el cdn -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('customMessage') == 'Deleted')
        <script>
            Swal.fire(
                'Deleted!',
                'Your category has been deleted.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'Updated')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your category has been updated',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    @if (session('customMessage') == 'All Categories Deleted')
        <script>
            Swal.fire(
                'Deleted!',
                'All your categories has been deleted.',
                'success'
            )
        </script>
    @endif

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

    <script>
        const btnDeleteAllCategories = document.getElementById('btnDeleteAllCategories');
        btnDeleteAllCategories.addEventListener('click', function (e){

            $('.form-deleteAllCategories').submit(function(e){
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

            $('.form-deleteAllCategories').submit();
        })

    </script>
@stop
