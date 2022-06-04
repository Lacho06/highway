@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <div class="mt-3"></div>
@stop
@section('content')

    <h2>Preferences</h2>
    <hr>

    <div class="col-12 d-flex flex-column mx-auto">
        @if ($preference != null)

            {!! Form::model($preference, ['route' => ['preference.update', $preference], 'method' => 'put', 'files' => true, 'class' => 'my-3']) !!}
                {!! Form::label('main_title', 'Title') !!}
                <small class="h6 d-inline text-danger">*</small>
                <x-adminlte-input name="main_title" enable-old-support value="{{$preference->main_title}}" placeholder="Main Title"/>
                {!! Form::label('main_subtitle', 'Subtitle') !!}
                <small class="h6 d-inline text-danger">*</small>
                <x-adminlte-input name="main_subtitle" enable-old-support value="{{$preference->main_subtitle}}" placeholder="Main Subtitle"/>
                {!! Form::label('nav_subtitle', 'Nav Subtitle') !!}
                <small class="h6 d-inline text-danger">*</small>
                <x-adminlte-input name="nav_subtitle" enable-old-support value="{{$preference->nav_subtitle}}" placeholder="Nav Subtitle"/>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        {!! Form::label('main_video', 'Video') !!}
                        <x-adminlte-input-file id="input_video" enable-old-support name="main_video" igroup-size="sm" placeholder="Choose a video...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-lightblue">
                                    <i class="fas fa-upload"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-file>
                        <x-adminlte-button label="Update" class="px-5 mr-auto" type="submit" theme="success" icon="fas fa-key"/>
                    </div>
                    @if ($preference->main_video != null)
                        <video id="video" src="{{$preference->main_video}}" width="200"></video>
                    @else
                        <video id="video" src="" width="200"></video>
                    @endif
                </div>
            {!! Form::close() !!}

        @else

            {!! Form::open(['route' => 'preference.store', 'files' => true, 'class' => 'my-3']) !!}
                {!! Form::label('main_title', 'Title') !!}
                <small class="h6 d-inline text-danger">*</small>
                <x-adminlte-input name="main_title" enable-old-support placeholder="Main Title"/>
                {!! Form::label('main_subtitle', 'Subtitle') !!}
                <small class="h6 d-inline text-danger">*</small>
                <x-adminlte-input name="main_subtitle" enable-old-support placeholder="Main Subtitle"/>
                {!! Form::label('nav_subtitle', 'Nav Subtitle') !!}
                <small class="h6 d-inline text-danger">*</small>
                <x-adminlte-input name="nav_subtitle" enable-old-support placeholder="Nav Subtitle"/>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        {!! Form::label('main_video', 'Video') !!}
                        <x-adminlte-input-file id="input_video" enable-old-support name="main_video" igroup-size="sm" placeholder="Choose a video...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-lightblue">
                                    <i class="fas fa-upload"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-file>
                        <x-adminlte-button label="Confirm" class="px-5 mr-auto" type="submit" theme="success" icon="fas fa-key"/>
                    </div>
                    <video id="video" src="" width="200"></video>
                </div>
            {!! Form::close() !!}

        @endif

        <h2>Card About</h2>

        @if ($cardImage != null)
            {!! Form::model($cardImage, ['route' => ['cardImage.update', $cardImage], 'method' => 'put', 'files' => true, 'class' => '']) !!}
                {!! Form::label('title', 'Title') !!}
                <small class="d-inline h6 text-danger">*</small>
                <x-adminlte-input name="title" enable-old-support value="{{$cardImage->title}}" placeholder="Title"/>
                {!! Form::label('text', 'Text') !!}
                <small class="d-inline h6 text-danger">*</small>
                <x-adminlte-input name="text" enable-old-support value="{{$cardImage->text}}" placeholder="Text"/>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        {!! Form::label('cover_image', 'Image') !!}
                        <x-adminlte-input-file id="input_image" name="cover_image" igroup-size="sm" placeholder="Choose a image...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-lightblue">
                                    <i class="fas fa-upload"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-file>
                        <x-adminlte-button label="Update" class="px-5 mr-auto" type="submit" theme="success" icon="fas fa-key"/>
                    </div>
                    @if ($cardImage->cover_image != null)
                        <img id="image" src="{{Storage::url($cardImage->cover_image)}}" width="200" alt="Cover Image">
                    @else
                        <img id="image" src="" width="200" alt="Cover Image">
                    @endif
                </div>

            {!! Form::close() !!}

        @else

            {!! Form::open(['route' => 'cardImage.store', 'files' => true, 'class' => '']) !!}
                {!! Form::label('title', 'Title') !!}
                <small class="d-inline h6 text-danger">*</small>
                <x-adminlte-input name="title" enable-old-support placeholder="Title"/>
                {!! Form::label('text', 'Text') !!}
                <small class="d-inline h6 text-danger">*</small>
                <x-adminlte-input name="text" enable-old-support placeholder="Text"/>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        {!! Form::label('cover_image', 'Image') !!}
                        <x-adminlte-input-file id="input_image" enable-old-support name="cover_image" igroup-size="sm" placeholder="Choose a image...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-lightblue">
                                    <i class="fas fa-upload"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-file>
                        <x-adminlte-button label="Create" class="px-5 mr-auto" type="submit" theme="success" icon="fas fa-key"/>
                    </div>
                    <img id="image" src="" width="200" alt="Cover Image">
                </div>

            {!! Form::close() !!}
        @endif

    </div>


    <h2 class="mt-5">Cards</h2>
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
                <x-adminlte-button id="btnDeleteCardsSelected" label="Delete Cards Selected" theme="warning" />
                <x-adminlte-button id="btnDeleteAllCards" label="Delete All Cards" theme="danger" />
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


    <h2>Received Emails</h2>
    <hr>
    @php
        $heads = [
            'ID',
            'User Name',
            ['label' => 'User Email', 'width' => 40],
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];
    @endphp
    <div class="d-flex justify-content-between my-3">
        <div>
            {{$mails->links()}}
        </div>
        <div>
            <x-adminlte-button id="btnDeleteMailsSelected" label="Delete Mails Selected" theme="warning" />
            <x-adminlte-button id="btnDeleteAllMails" label="Delete All Mails" theme="danger" />
            <form action="{{route('mail.deleteAll')}}" method="post" class="d-none form-deleteAllMails">
                @csrf @method("DELETE")
                <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" id="btn-delete" title="Delete All">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
    <form action="{{route('mail.deleteSelected')}}" method="post" id="form-delete-mail">
        @csrf
        <x-adminlte-datatable id="table1" :heads="$heads">
            @forelse($mails as $mail)
                <tr>
                    <td>
                        <input type="checkbox" value="{{$mail->id}}" id="{{$mail->id}}" name="mailsSelected[]">
                        {{$mail->id}}
                    </td>
                    <td>{{$mail->name}}</td>
                    <td>{{$mail->user_email}}</td>
                    <td>
                        <nobr>
                            <form action="{{route('mail.destroy', $mail)}}" method="post" class="d-inline form-email-delete">
                                @csrf @method("DELETE")
                                <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" id="btn-delete" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                            </form>
                            <a href="{{route('mail.show', $mail->id)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                        </nobr>
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td>There are no emails to show</td>
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
        const btnMail = document.getElementById('btnDeleteMailsSelected');
        const formMail = document.getElementById('form-delete-mail');
        btnMail.addEventListener('click', function (e){
            formMail.submit();
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

    <script>
        const btnDeleteAllMails = document.getElementById('btnDeleteAllMails');
        btnDeleteAllMails.addEventListener('click', function (e){

            $('.form-deleteAllMails').submit(function(e){
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

            $('.form-deleteAllMails').submit();
        })

    </script>


    <script>

            $('.form-email-delete').submit(function(e){
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


    <script>

        const input_video = document.getElementById('input_video')
        input_video.addEventListener('change', changeVideo)
        function changeVideo(e){
            const file = e.target.files[0]
            const reader = new FileReader()
            reader.onload = (e) => {
                document.getElementById('video').setAttribute('src', e.target.result)
            }
            reader.readAsDataURL(file)
        }

    </script>

@stop
