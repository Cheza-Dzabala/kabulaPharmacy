@extends('layouts.master')


@section('pageTitle')
  Stock Reports
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
            <h5 class="panel-title">Stock Reports</h5>
            <div class="heading-elements">
            </div>
        </div>

        <div class="panel-body">
            Full table of all stocks in this system.
        </div>

        <table class="table table-lg invoice-archive">
            <thead>
            <th>Stock Id #</th>
            <th>Stock</th>
            <th>Quantity Bought</th>
            <th>Order</th>
            <th>Batch Number</th>
            <th>Purchase Cost</th>
            <th>Date</th>
            <th>Expiration Date</th>
            <th class="text-center">Actions</th>
            </thead>
            <tbody>
            @foreach($stockReports as $stockReport)
                <tr>
                    <td>{{ $stockReport->id }}</td>
                    <td>{{ $stockReport->stockItem }} <a><span class="pull-right label label-success">Compile Data Report</span></a> </td>
                    <td class="col-md-1 col-lg-1">{{ $stockReport->quantity }}</td>
                    <td>{{ $stockReport->supplier }}</td>
                    <td>{{ $stockReport->batchNumber }}</td>
                    <td>{{ $stockReport->purchaseCost }}</td>
                    <td>{{ $stockReport->date_created }}</td>
                    <td>{{ $stockReport->expiry_date }}</td>
                    <td class="text-center">
                        <ul class="icons-list">
                            <li>
                                <a href="{{ route('order.generate', $stockReport->orderId) }}">
                                    <i class="icon-file-eye"></i> View Order
                                </a>
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

