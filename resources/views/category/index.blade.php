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

        // $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
        //                 <i class="fa fa-lg fa-fw fa-pen"></i>
        //             </button>';
        // $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
        //                 <i class="fa fa-lg fa-fw fa-trash"></i>
        //             </button>';
        // $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
        //                 <i class="fa fa-lg fa-fw fa-eye"></i>
        //             </button>';

        // $config = [
        //     'data' => [
        //         [22, 'John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        //         [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        //         [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        //     ],
        //     'order' => [[1, 'asc']],
        //     'columns' => [null, null, null, ['orderable' => false]],
        // ];
    @endphp
    {{$categories->links()}}
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
