@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <x-adminlte-button label="Add Feature" id="btn-modal" theme="info" />
    <div class="mt-3"></div>
@stop
@section('content')

    <div class="card card-success">
        <div class="card-header">
            <h2>Edit Plan</h2>
        </div>
        <div class="card-body">
            {!! Form::model($plan, ['route' => ['plan.update', $plan], 'files' => true, 'method' => 'put', 'class' => '']) !!}
                {!! Form::label('name', 'Name') !!}
                <small class="d-inline h6 text-danger">*</small>
                <x-adminlte-input name="name" enable-old-support value="{{$plan->name}}" placeholder="Name"/>
                {!! Form::label('price', 'Price') !!}
                <small class="d-inline h6 text-danger">*</small>
                <x-adminlte-input name="price" type="number" enable-old-support value="{{$plan->price}}" placeholder="Price"/>
                <x-adminlte-button label="Update" type="submit" theme="success" />
            {!! Form::close() !!}

        </div>
    </div>

@stop
@section('js')
    <!-- TODO: cuando ejecute npm run dev quitar el cdn -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('customMessage') == 'Feature saved')
        <script>
            Swal.fire(
                'Saved!',
                'Your feature has been saved.',
                'success'
            )
        </script>
    @endif


    <script>

        const btnModal = document.getElementById('btn-modal');
        btnModal.addEventListener('click', function(e){

            Swal.fire({
                title: 'Select a feature',
                html: `    {!! Form::open(['route' => 'plan.addFeature', 'id' => 'form', 'files' => true]) !!}
                                <x-adminlte-input name="name" placeholder="Write a feature here..." />
                            {!! Form::hidden('plan_id', $plan->id) !!}
                            <x-adminlte-button label="Confirm" type="submit" theme="success" class="d-none" icon="fas fa-key"/>
                            {!! Form::close() !!}`,
                confirmButtonText: 'Send',
                focusConfirm: false,
                preConfirm: () => {
                    const form = Swal.getPopup().querySelector('#form')
                    const feature = Swal.getPopup().querySelector('#name')
                    if (!feature.value) {
                        Swal.showValidationMessage(`Please enter a feature`)
                    }else{
                        form.submit();
                    }
                }
            })
        })


    </script>

@stop
