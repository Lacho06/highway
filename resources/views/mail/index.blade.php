@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <div class="mt-1"></div>
@stop
@section('content')

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
            @empty(!$data)
                <x-adminlte-button id="btnDeleteMailsSelected" label="Delete Mails Selected" theme="warning" />
                <x-adminlte-button id="btnDeleteAllMails" label="Delete All Mails" theme="danger" />
            @endempty
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
        const btnMail = document.getElementById('btnDeleteMailsSelected');
        const formMail = document.getElementById('form-delete-mail');
        btnMail.addEventListener('click', function (e){
            formMail.submit();
        });

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

@stop
