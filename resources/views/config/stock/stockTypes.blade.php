@extends('layouts.master')


@section('pageTitle')
    Stock Types
@endsection

@section('scripts')

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
    <!-- /theme JS files -->
@endsection

@section('content')
    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">TYPES</h5>
            <div class="heading-elements">
                <button type="button" class="btn bg-teal-400 btn-labeled" data-toggle="modal" data-target="#newStockType" ><b><i class="icon-plus22"></i></b> New Stock Type</button>
            </div>
        </div>

        <div class="panel-body">
            The table below is a list of all stock types currently recorded in the system.
        </div>

        <table class="table datatable-basic">
            <thead>
            <th>Name</th>
            <th>Date Created</th>
            <th>Actions</th>
            </thead>
            <tbody>
            @foreach($stockTypes as $key => $value)
                <tr>
                    <td>{{ $value['name'] }}</td>
                    <td>{{ $value['created_at'] }}</td>
                    <td>Edit</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

@endsection


@include('partials.modals.config.stockTypes.stockTypes')