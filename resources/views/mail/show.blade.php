@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <div class="mt-3"></div>
@stop
@section('content')

    <div class="row">
        <div class="col-12 d-flex flex-column">
            <h2>{{$mail->name}}</h2>
            <p>{{$mail->user_email}}</p>
            <p>{{$mail->message}}</p>
        </div>
        <x-adminlte-button id="btn-modal" label="Response mail" theme="info" icon="fas fa-key"/>
    </div>

@stop
@section('js')

    <!-- TODO: cuando ejecute npm run dev quitar el cdn -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        const btnModal = document.getElementById('btn-modal');
        btnModal.addEventListener('click', function(e){

            Swal.fire({
                title: 'Response',
                html: `     {!! Form::open(['route' => 'mail.store', 'id' => 'form', 'files' => true]) !!}
                                {!! Form::hidden('mail', $mail->id) !!}
                                <x-adminlte-button label="Confirm" type="submit" theme="success" class="d-none" icon="fas fa-key"/>
                            {!! Form::close() !!}`,
                confirmButtonText: 'Send',
                focusConfirm: false,
                preConfirm: () => {
                    const form = Swal.getPopup().querySelector('#form')
                    form.submit();
                }
            })
        })

    </script>
@stop
