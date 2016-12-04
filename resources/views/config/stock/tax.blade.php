@extends('layouts.master')

@section('pageTitle')
    Tax Configurations
@endsection

@section('scripts')
    <!-- Theme JS files -->
    <script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

    <script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>

    <script type="text/javascript" src="assets/js/plugins/notifications/pnotify.min.js"></script>

    <script type="text/javascript" src="assets/js/pages/components_notifications_pnotify.js"></script>
@endsection

@section('notifications')
    @if(Session::has('success'))
        <script>
            $('#pnotify-success').on('click', function () {
                new PNotify({
                    title: 'Success notice',
                    text: 'Check me out! I\'m a notice.',
                    icon: 'icon-checkmark3',
                    type: 'success'
                });
            });
        </script>
    @endif
@endsection

@section('content')
    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Tax Profile</h5>
            <div class="heading-elements">
                <button type="button" class="btn bg-teal-400 btn-labeled" data-toggle="modal" data-target="#newTaxProfile" ><b><i class="icon-plus22"></i></b> New Taxation Profile</button>
            </div>
        </div>

        <div class="panel-body">
            The table below is a list of all tax profile currently recorded in the system. You must not delete tax profiles that currently have stock assigned.
        </div>

        <table class="table datatable-basic">
            <thead>
                <th>Name</th>
                <th>Description</th>
                <th>Percentage Taxable</th>
                <th>Date Create</th>
                <th>Created By</th>
                <th>Actions</th>
            </thead>
            <tbody>
               @foreach($profiles as $key => $value)
                   <tr>
                       <td>{{ $value['name'] }}</td>
                       <td>{{ $value['description'] }}</td>
                       <td>@if ($value['taxablePercentage'] != ''){{  $value['taxablePercentage']  }} @else 0 @endif</td>
                       <td>{{ $value['created_at'] }}</td>
                       <td>{{ $value['createdBy'] }}</td>
                       <td>Edit</td>
                   </tr>
               @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

@endsection


@include('partials.modals.config.stocks.taxProfile')