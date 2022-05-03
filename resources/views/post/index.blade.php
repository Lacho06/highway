@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <h2>Posts</h2>
@stop

@section('content')

    @php
        $heads = [
            'ID',
            'Title',
            ['label' => 'Text', 'width' => 40],
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];
    @endphp

    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->text}}</td>
                <td>
                    <nobr>
                        <a href="{{route('post.edit', $post)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <form action="{{route('post.destroy', $post)}}" method="post" class="d-inline form-delete">
                            @csrf @method("DELETE")
                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" id="btn-delete" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{route('post.show', $post->id)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
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
                'Your post has been deleted.',
                'success'
            )
        </script>

    @endif

    @if (session('customMessage') == 'Updated')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your post has been updated',
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
