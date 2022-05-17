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
                <x-adminlte-input name="main_title" enable-old-support value="{{$preference->main_title}}" placeholder="Main Title"/>
                <x-adminlte-input name="main_subtitle" enable-old-support value="{{$preference->main_subtitle}}" placeholder="Main Subtitle"/>
                <x-adminlte-input name="nav_subtitle" enable-old-support value="{{$preference->nav_subtitle}}" placeholder="Nav Subtitle"/>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <x-adminlte-input-file id="input_video" name="main_video" igroup-size="sm" placeholder="Choose a video...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-lightblue">
                                    <i class="fas fa-upload"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-file>
                        <x-adminlte-button label="Update" class="px-5 mr-auto" type="submit" theme="success" icon="fas fa-key"/>
                    </div>
                    @if ($preference->main_video)
                        <video id="video" src="{{$preference->main_video}}" width="200"></video>
                    @else
                        <video id="video" src="" width="200"></video>
                    @endif
                </div>
            {!! Form::close() !!}

        @else

            {!! Form::open(['route' => 'preference.store', 'files' => true, 'class' => 'my-3']) !!}
                <x-adminlte-input name="main_title" placeholder="Main Title"/>
                <x-adminlte-input name="main_subtitle" placeholder="Main Subtitle"/>
                <x-adminlte-input name="nav_subtitle" placeholder="Nav Subtitle"/>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <x-adminlte-input-file id="input_video" name="main_video" igroup-size="sm" placeholder="Choose a video...">
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

                <x-adminlte-input name="title" enable-old-support value="{{$cardImage->title}}" placeholder="Title"/>
                <x-adminlte-input name="text" enable-old-support value="{{$cardImage->text}}" placeholder="Text"/>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <x-adminlte-input-file id="input_image" name="cover_image" igroup-size="sm" placeholder="Choose a image...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-lightblue">
                                    <i class="fas fa-upload"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-file>
                        <x-adminlte-button label="Update" class="px-5 mr-auto" type="submit" theme="success" icon="fas fa-key"/>
                    </div>
                    @if ($cardImage->cover_image)
                        <img id="image" src="{{Storage::url($cardImage->cover_image)}}" width="200" alt="Cover Image">
                    @else
                        <img id="image" src="" width="200" alt="Cover Image">
                    @endif
                </div>

            {!! Form::close() !!}

        @else

            {!! Form::open(['route' => 'cardImage.store', 'files' => true, 'class' => '']) !!}

                <x-adminlte-input name="title" enable-old-support placeholder="Title"/>
                <x-adminlte-input name="text" enable-old-support placeholder="Text"/>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <x-adminlte-input-file id="input_image" name="cover_image" igroup-size="sm" placeholder="Choose a image...">
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
            ['label' => 'Text', 'width' => 40],
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];
    @endphp
    <div class="d-flex justify-content-between">
        {{$cards->links()}}
        <a href="{{route('card.create')}}">
            <x-adminlte-button label="Create Card" theme="info" icon="fas fa-info-circle"/>
        </a>
    </div>

    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach($cards as $card)
            <tr>
                <td>{{$card->id}}</td>
                <td>{{$card->title}}</td>
                <td>{{$card->text}}</td>
                <td>
                    <nobr>
                        <a href="{{route('card.edit', $card)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <form action="{{route('card.destroy', $card)}}" method="post" class="d-inline form-delete">
                            @csrf @method("DELETE")
                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" id="btn-delete" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{route('card.show', $card->id)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>
                    </nobr>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>


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
    {{$mails->links()}}

    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach($mails as $mail)
            <tr>
                <td>{{$mail->id}}</td>
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
        @endforeach
    </x-adminlte-datatable>

@stop
@section('js')
    <!-- TODO: cuando ejecute npm run dev quitar el cdn -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
