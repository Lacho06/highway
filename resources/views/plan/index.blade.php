@extends('adminlte::page')
@section('title', 'Highway - Admin')
@section('content_header')
    <h2>Plans</h2>
@stop

@section('content')

    @php
        $heads = [
            'ID',
            'Name',
            ['label' => 'Price', 'width' => 40],
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];
    @endphp
    <div class="d-flex justify-content-between my-3">
        <div>
            {{$plans->links()}}
        </div>
        <div>
            <x-adminlte-button id="btnDeletePlansSelected" label="Delete Plans Selected" theme="warning" />
            <x-adminlte-button id="btnDeleteAllPlans" label="Delete All Plans" theme="danger" />
            <form action="{{route('plan.deleteAll')}}" method="post" class="d-none form-deleteAllPlans">
                @csrf @method("DELETE")
                <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" id="btn-delete" title="Delete All">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
    <form action="{{route('plan.deleteSelected')}}" method="post" id="form-delete-plan">
        @csrf
        <x-adminlte-datatable id="table1" :heads="$heads">
            @foreach($plans as $plan)
                <tr>
                    <td>
                        <input type="checkbox" value="{{$plan->id}}" id="{{$plan->id}}" name="plansSelected[]">
                        {{$plan->id}}
                    </td>
                    <td>{{$plan->name}}</td>
                    <td>${{$plan->price}}</td>
                    <td>
                        <nobr>
                            <a href="{{route('plan.edit', $plan)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            {{-- <form action="{{route('plan.destroy', $plan)}}" method="post" class="d-inline form-delete">
                                @csrf @method("DELETE")
                                <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" id="btn-delete" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                            </form> --}}
                            <a href="{{route('plan.show', $plan)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                        </nobr>
                    </td>
                </tr>
            @endforeach
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
                'Your category has been deleted.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'Updated')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your category has been updated',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    @if (session('customMessage') == 'All Plans Deleted')
        <script>
            Swal.fire(
                'Deleted!',
                'All your plans has been deleted.',
                'success'
            )
        </script>
    @endif

    @if (session('customMessage') == 'Plans Selected Deleted')
        <script>
            Swal.fire(
                'Deleted!',
                'Your selection has been deleted.',
                'success'
            )
        </script>
    @endif

    <script>
        const btnPlan = document.getElementById('btnDeletePlansSelected');
        const formPlan = document.getElementById('form-delete-plan');
        btnPlan.addEventListener('click', function (e){
            formPlan.submit();
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
@stop

