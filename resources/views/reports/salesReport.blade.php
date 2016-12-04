@extends('layouts.master')


@section('pageTitle')
    Generic Names
@endsection

@section('scripts')

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/invoice_archive.js') }}"></script>
    <!-- /theme JS files -->
@endsection


@section('content')
    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Sales Reports</h5>
            <div class="heading-elements">
            </div>
        </div>

        <div class="panel-body">
            Full table of all transactions done on this system.
        </div>

        <table class="table table-lg invoice-archive">
            <thead>
            <th>Transaction #</th>
            <th>Date Created</th>
            <th>Attendee Name</th>
            <th>Transaction Value</th>
            <th>Quantity Bought</th>
            <th>Stock Item</th>
            <th class="text-center">Actions</th>
            </thead>
            <tbody>
            @foreach($salesReports as $salesReport)
                <tr>
                    <td>{{ $salesReport->transactionId }}</td>
                    <td>{{ $salesReport->date }} <a><span class="pull-right label label-success">Compile Data Report</span></a> </td>
                    <td>{{ $salesReport->attendant }}</td>
                    <td>{{ $salesReport->amount }}</td>
                    <td>{{ $salesReport->stockAmount }}</td>
                    <td>{{ $salesReport->item }}</td>
                    <td class="text-center">
                        <ul class="icons-list">
                            <li><a href="#" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i> <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-file-download"></i> Download</a></li>
                                        <li class="divider"></li>
                                    <li><a href="#"><i class="icon-printer"></i> Print</a></li>
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


@include('partials.modals.config.genericNames.genericNames')