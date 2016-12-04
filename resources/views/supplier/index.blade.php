
@extends('layouts.master')

@section('pageTitle')
    Suppliers
@endsection


@section('quick-tools')
    <a href="{{ route('new-supplier') }}"><button type="button" class="btn bg-teal-400 btn-labeled"><b><i class="icon-plus22"></i></b> Create New Supplier</button></a>
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
            <h5 class="panel-title">Suppliers</h5>
            <div class="heading-elements">

            </div>
        </div>

        <div class="panel-body">
            The table below is a list of all suppliers currently recorded in the system. Suppliers are viewable and editable.
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>Supplier Name</th>
                <th>Address</th>
                <th>Primary Contact Person</th>
                <th>Primary Contact Number</th>
                <th>Primary Contact Email</th>
                <th>City</th>
                <th>Supplier ID</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($suppliers as $key => $value)
                <tr>
                    <td>{{ $value['supplierName'] }}</td>
                    <td>{{ $value['address'] }}</td>
                    <td>{{ $value['primaryContactPerson'] }}</td>
                    <td>{{ $value['primaryPhonenumber'] }}</td>
                    <td>{{ $value['primaryEmail'] }}</td>
                    <td>{{ $value['city'] }}</td>
                    <td><span class="label label-success">{{ $value['id'] }}</span></td>
                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-file-pdf"></i> Manage Supplier</a></li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

@endsection