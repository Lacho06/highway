@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <div class="mt-3"></div>
@stop

@section('content')

    <div class="row">
        <div class="col-12 d-flex flex-column">
            <h2 class="h2 mx-auto">Card info:</h2>
            <div class="card mx-auto">
                @if ($card->image)
                    <img class="card-img-top" src="{{Storage::url($card->image->url)}}" alt="{{$card->title}}">
                @endif
                <div class="card-body">
                    <h2>{{$card->title}}</h2>
                    <p>{{$card->text}}</p>
                </div>
            </div>
        </div>
    </div>

@stop
