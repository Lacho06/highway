@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <div class="mt-3"></div>
@stop
@section('content')

    <link
    rel="stylesheet"
    href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css"
    type="text/css"
    />

    {{-- <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script> --}}
    {{-- Dropzone cdn --}}
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <h2>Change Password</h2>
    <hr>

    {!! Form::open(['route' => 'admin.changePassword', 'id' => 'form-changePassword']) !!}
        {!! Form::label('old_password', 'Old Password') !!}
        <small class="h6 d-inline text-danger">*</small>
        <x-adminlte-input name="old_password" enable-old-support  placeholder="Old Password"/>
        {!! Form::label('new_password', 'New Password') !!}
        <small class="h6 d-inline text-danger">*</small>
        <x-adminlte-input name="new_password" enable-old-support  placeholder="New Password"/>
        {!! Form::label('confirm_password', 'Confirm Password') !!}
        <small class="h6 d-inline text-danger">*</small>
        <x-adminlte-input name="confirm_password" enable-old-support  placeholder="Confirm Password"/>
        <x-adminlte-button label="Change" class="px-5 mt-2 mb-5 mr-auto" type="submit" theme="success" id="btn-changePassword" />
    {!! Form::close() !!}
    <script defer>
        const btnChangePassword = document.getElementById('btn-changePassword');
        const formChangePassword = document.getElementById('form-changePassword');
        btnChangePassword.addEventListener('click', function (e){
            formChangePassword.submit();
        });
    </script>


    <h2>Preferences</h2>
    <hr>

    <div class="col-12 d-flex flex-column mx-auto">
        @if ($preference != null)

            {!! Form::model($preference, ['route' => ['preference.update', $preference], 'method' => 'put', 'files' => true, 'class' => 'my-3', 'id' => 'form-update']) !!}
                {!! Form::label('main_title', 'Title') !!}
                <small class="h6 d-inline text-danger">*</small>
                <x-adminlte-input name="main_title" enable-old-support value="{{$preference->main_title}}" placeholder="Main Title"/>
                {!! Form::label('main_subtitle', 'Subtitle') !!}
                <small class="h6 d-inline text-danger">*</small>
                <x-adminlte-input name="main_subtitle" enable-old-support value="{{$preference->main_subtitle}}" placeholder="Main Subtitle"/>
                {!! Form::label('nav_subtitle', 'Nav Subtitle') !!}
                <small class="h6 d-inline text-danger">*</small>
                <x-adminlte-input name="nav_subtitle" enable-old-support value="{{$preference->nav_subtitle}}" placeholder="Nav Subtitle"/>
            {!! Form::close() !!}

            @if ($preference->main_video != null)
                {!! Form::label('file', 'Video') !!}
                <form action="{{route('preference.videoUpdate', $preference)}}" method="POST" class="dropzone" id="my-great-dropzone">
                    @csrf
                </form>

                <script defer>
                    Dropzone.options.myGreatDropzone = {
                        method: 'put',
                        maxFilesize: 50,
                        acceptedFiles: 'video/*',
                        maxFiles: 1
                    };
                </script>

            @else
                {!! Form::label('file', 'Video') !!}
                <form action="{{route('preference.videoStore')}}" method="POST" class="dropzone" id="my-great-dropzone">
                    @csrf
                </form>

                <script defer>
                    Dropzone.options.myGreatDropzone = {
                        maxFilesize: 50,
                        acceptedFiles: 'video/*',
                        maxFiles: 1
                    };
                </script>

            @endif
            <x-adminlte-button label="Update" class="px-5 mt-3 mr-auto" type="submit" theme="success" id="btn-update" />
            <script defer>
                const btnUpdate = document.getElementById('btn-update');
                const formUpdate = document.getElementById('form-update');
                btnUpdate.addEventListener('click', function (e){
                    formUpdate.submit();
                });
            </script>

        @else

            {!! Form::open(['route' => 'preference.store', 'files' => true, 'class' => 'my-3', 'id' => 'form-create']) !!}
                {!! Form::label('main_title', 'Title') !!}
                <small class="h6 d-inline text-danger">*</small>
                <x-adminlte-input name="main_title" enable-old-support placeholder="Main Title"/>
                {!! Form::label('main_subtitle', 'Subtitle') !!}
                <small class="h6 d-inline text-danger">*</small>
                <x-adminlte-input name="main_subtitle" enable-old-support placeholder="Main Subtitle"/>
                {!! Form::label('nav_subtitle', 'Nav Subtitle') !!}
                <small class="h6 d-inline text-danger">*</small>
                <x-adminlte-input name="nav_subtitle" enable-old-support placeholder="Nav Subtitle"/>
            {!! Form::close() !!}

                {!! Form::label('file', 'Video') !!}
                <form action="{{route('preference.videoStore')}}" method="POST" class="dropzone" id="my-great-dropzone">
                    @csrf
                </form>

                <script defer>
                    Dropzone.options.myGreatDropzone = {
                        maxFilesize: 50,
                        acceptedFiles: 'video/*',
                        maxFiles: 1
                    };
                </script>
                <x-adminlte-button label="Create" class="px-5 mt-3 mr-auto" type="submit" theme="success" id="btn-create" />
                <script defer>
                    const btnCreate = document.getElementById('btn-create');
                    const formCreate = document.getElementById('form-create');
                    btnCreate.addEventListener('click', function (e){
                        formCreate.submit();
                    });
                </script>

        @endif
    </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    <h2 class="mt-5">Cards</h2>
    <h6>These are the cards that will be displayed in the about view.</h6>
    <hr>

    @php
        $heads = [
            'ID',
            'Title',
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];
    @endphp


        <div class="d-flex justify-content-between my-3">
            <div>
                {{$cards->links()}}
            </div>
            <div>
                <a href="{{route('card.create')}}">
                    <x-adminlte-button label="Create Card" theme="info" />
                </a>
                @empty(!$data)
                    <x-adminlte-button id="btnDeleteCardsSelected" label="Delete Cards Selected" theme="warning" />
                    <x-adminlte-button id="btnDeleteAllCards" label="Delete All Cards" theme="danger" />
                @endempty
                <form action="{{route('card.deleteAll')}}" method="post" class="d-none form-deleteAllCards">
                    @csrf @method("DELETE")
                    <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" id="btn-delete" title="Delete All">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>

        <form action="{{route('card.deleteSelected')}}" id="form-delete-card" method="POST">
            @csrf
            <x-adminlte-datatable id="table1" :heads="$heads">
                @forelse($cards as $card)
                    <tr>
                        <td>
                            <input type="checkbox" value="{{$card->id}}" id="{{$card->id}}" name="cardsSelected[]">
                            {{$card->id}}
                        </td>
                        <td>{{$card->title}}</td>
                        <td>
                            <nobr>
                                <a href="{{route('card.edit', $card)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                                {{-- <form action="{{route('card.destroy', $card)}}" method="post" class="d-inline form-delete">
                                    @csrf @method("DELETE")
                                    <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" id="btn-delete" title="Delete">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                </form> --}}
                                <a href="{{route('card.show', $card->id)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </a>
                            </nobr>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td></td>
                        <td>There are no cards to show</td>
                        <td></td>
                    </tr>
                @endforelse
            </x-adminlte-datatable>
        </form>

@stop
@section('js')
    <!-- TODO: cuando ejecute npm run dev quitar el cdn -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        const btnCard = document.getElementById('btnDeleteCardsSelected');
        const formCard = document.getElementById('form-delete-card');
        btnCard.addEventListener('click', function (e){
            formCard.submit();
        });

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

    <script>
        const btnDeleteAllCards = document.getElementById('btnDeleteAllCards');
        btnDeleteAllCards.addEventListener('click', function (e){

            $('.form-deleteAllCards').submit(function(e){
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

            $('.form-deleteAllCards').submit();
        })

    </script>


    @if (session('customMessage') == 'Password Error')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'
            })
        </script>
    @endif

    @if (session('customMessage') == 'Password Changed')
        <script>
            Swal.fire(
                'Updated!',
                'Your password has been changed.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'Mail Deleted')
        <script>
            Swal.fire(
                'Deleted!',
                'Your mail has been deleted.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'Preferences Created')
        <script>
            Swal.fire(
                'Created!',
                'Your preferences has been created.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'Preferences Updated')
        <script>
            Swal.fire(
                'Updated!',
                'Your preferences has been updated.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'Card Deleted')
        <script>
            Swal.fire(
                'Deleted!',
                'Your card has been deleted.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'Cards Selected Deleted')
        <script>
            Swal.fire(
                'Deleted!',
                'Your selection has been deleted.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'Mails Selected Deleted')
        <script>
            Swal.fire(
                'Deleted!',
                'Your selection has been deleted.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'All Cards Deleted')
        <script>
            Swal.fire(
                'Deleted!',
                'All your cards has been deleted.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'All Mails Deleted')
        <script>
            Swal.fire(
                'Deleted!',
                'All your mails has been deleted.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'Card Updated')
        <script>
            Swal.fire(
                'Updated!',
                'Your card has been updated.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'Card Created')
        <script>
            Swal.fire(
                'Created!',
                'Your card has been created.',
                'success'
            )
        </script>
    @endif

@stop
