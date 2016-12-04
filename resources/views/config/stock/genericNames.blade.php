@extends('layouts.master')


@section('pageTitle')
    Generic Names
@endsection

@section('scripts')

    <!-- Theme JS files -->
    <script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

    <script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>
    <!-- /theme JS files -->
@endsection


@section('content')
    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Departments</h5>
            <div class="heading-elements">
                <button type="button" class="btn bg-teal-400 btn-labeled" data-toggle="modal" data-target="#newGenericName" ><b><i class="icon-plus22"></i></b> New Generic Name</button>
            </div>
        </div>

        <div class="panel-body">
            The table below is a list of all Departments currently recorded in the system.
        </div>

        <table class="table datatable-basic">
            <thead>
            <th>Name</th>
            <th>Date Created</th>
            <th>Actions</th>
            <th></th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
            @foreach($genericNames as $genericName)
                <tr>
                    <td>{{ $genericName->name }}</td>
                    <td>{{ $genericName->created_at }}</td>
                    <td>Edit</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

@endsection


@include('partials.modals.config.genericNames.genericNames')