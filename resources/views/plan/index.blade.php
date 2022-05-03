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

    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach($plans as $plan)
            <tr>
                <td>{{$plan->id}}</td>
                <td>{{$plan->name}}</td>
                <td>${{$plan->price}}</td>
                <td>
                    <nobr>
                        <a href="{{route('plan.edit', $plan)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <form action="{{route('plan.destroy', $plan)}}" method="post" class="d-inline">
                            @csrf @method("DELETE")
                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" id="btn-delete" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{route('plan.show', $plan)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>
                    </nobr>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

@stop
