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
            // ['label' => 'Text', 'width' => 40],
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];
    @endphp
    <div class="d-flex justify-content-between my-3">
        <div>
            {{$posts->links()}}
        </div>
        <div>
            @empty(!$data)
                <x-adminlte-button id="btnDeletePostsSelected" label="Delete Posts Selected" theme="warning" />
                <x-adminlte-button id="btnDeleteAllPosts" label="Delete All Posts" theme="danger" />
            @endempty
            <form action="{{route('post.deleteAll')}}" method="post" class="d-none form-deleteAllPosts">
                @csrf @method("DELETE")
                <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" id="btn-delete" title="Delete All">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
    <form action="{{route('post.deleteSelected')}}" method="post" id="form-delete-post">
        @csrf
        <x-adminlte-datatable id="table1" :heads="$heads">
            @forelse($posts as $post)
                <tr>
                    <td>
                        <input type="checkbox" value="{{$post->id}}" id="{{$post->id}}" name="postsSelected[]">
                        {{$post->id}}
                    </td>
                    <td>{{$post->title}}</td>
                    {{-- <td style="text-overflow: ellipsis;">{{$post->text}}</td> --}}
                    <td>
                        <nobr>
                            <a href="{{route('post.edit', $post)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            {{-- <form action="{{route('post.destroy', $post)}}" method="post" class="d-inline form-delete">
                                @csrf @method("DELETE")
                                <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" id="btn-delete" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                            </form> --}}
                            <a href="{{route('post.show', $post->id)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                        </nobr>
                    </td>
                </tr>@empty
                <tr>
                    <td></td>
                    <td>There are no posts to show</td>
                    <td></td>
                </tr>
            @endforelse
        </x-adminlte-datatable>
    </form>


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


    @if (session('customMessage') == 'All Posts Deleted')
        <script>
            Swal.fire(
                'Deleted!',
                'All your posts has been deleted.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'Posts Selected Deleted')
        <script>
            Swal.fire(
                'Deleted!',
                'Your selection has been deleted.',
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
        const btnPost = document.getElementById('btnDeletePostsSelected');
        const formPost = document.getElementById('form-delete-post');
        btnPost.addEventListener('click', function (e){
            formPost.submit();
        });

    </script>

    <script>
        const btnDeleteAllPosts = document.getElementById('btnDeleteAllPosts');
        btnDeleteAllPosts.addEventListener('click', function (e){

            $('.form-deleteAllPosts').submit(function(e){
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

            $('.form-deleteAllPosts').submit();
        })

    </script>
@stop
