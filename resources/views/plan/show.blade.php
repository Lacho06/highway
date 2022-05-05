@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <div class="mt-3"></div>
@stop

@section('content')

    @php
        $heads = [
            'ID',
            'Name',
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];
    @endphp

    <div class="row">
        <div class="col-12">
            <p><b>Name: </b><span class="h2">{{$plan->name}}</span></p>
            <p><b>Price: </b><span class="h2">${{$plan->price}}</span></p>
            <div class="d-flex justify-content-between mb-3">
                <h3 class="ml-2">Features</h3>
                <x-adminlte-button class="mr-2" label="Add feature" id="btn-modal" theme="success" icon="fas fa-thumbs-up"/>
            </div>
            <x-adminlte-datatable id="table1" :heads="$heads">
                @foreach($plan->features as $feature)
                    <tr>
                        <td>{{$feature->id}}</td>
                        <td>{{$feature->name}}</td>
                        <td>
                            <nobr>
                                <form action="{{route('plan.deleteFeature', $feature)}}" method="post" class="d-inline form-delete">
                                    @csrf @method("DELETE")
                                    <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" id="btn-delete" title="Delete">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                </form>
                            </nobr>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>

@stop
@section('js')
    <!-- TODO: cuando ejecute npm run dev quitar el cdn -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('customMessage') == 'Deleted')
        <script>
            Swal.fire(
                'Deleted!',
                'Your image has been deleted.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'Feature saved')
        <script>
            Swal.fire(
                'Saved!',
                'Your image has been saved.',
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
