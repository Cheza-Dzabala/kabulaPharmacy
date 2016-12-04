@extends('layouts.master')


@section('pageTitle')
    Departments
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
                <button type="button" class="btn bg-teal-400 btn-labeled" data-toggle="modal" data-target="#newStockDepartment" ><b><i class="icon-plus22"></i></b> New Department</button>
            </div>
        </div>

        <div class="panel-body">
            The table below is a list of all Departments currently recorded in the system.
        </div>

        <table class="table datatable-basic">
            <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Date Created</th>
            <th>Created By</th>
            <th>Actions</th>
            </thead>
            <tbody>
                @foreach($departments as $key => $value)
                    <tr>
                        <td>{{ $value['name'] }}</td>
                        <td>{{ $value['description'] }}</td>
                        <td>{{ $value['created_at'] }}</td>
                        <td>{{ $value['user'] }}</td>
                        <td>Edit</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

@endsection


@include('partials.modals.config.departments.stockDepartment')