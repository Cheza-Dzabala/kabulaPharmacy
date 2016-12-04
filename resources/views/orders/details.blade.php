
@extends('layouts.master')

@section('pageTitle')
    Order Details
@endsection


@section('quick-tools')
    @if($order->order_placed == 0)
         <a href="{{ route('order.add.stock', $id) }}" type="button" class="btn bg-teal-400 btn-labeled"><b><i class="icon-plus22"></i></b> Add From Stock</a>
         <a href="{{ route('order.add.product', $id) }}"><button type="button" class="btn bg-teal-800 btn-labeled"><b><i class="icon-plus22"></i></b> Add From Product Database</button></a>
         <a href="{{ route('order.generate', $id) }}"><button type="button" class="btn bg-blue-400 btn-labeled"><b><i class="icon-file-spreadsheet"></i></b>Place Order</button></a>
        @else
        <a href="{{ route('order.generate', $id) }}"><button type="button" class="btn bg-blue-400 btn-labeled"><b><i class="icon-file-spreadsheet"></i></b>View Order</button></a>
    @endif
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
            <h5 class="panel-title">Order Details</h5>
            <div class="heading-elements">

            </div>
        </div>

        <div class="panel-body">
            @if($order->order_placed == 1)
                Placed On: {{ \Carbon\Carbon::parse($order->updated_at)->toFormattedDateString() }}
            @endif
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>Source</th>
                <th>Brand Name</th>
                <th>Type</th>

                <th>Quantity</th>
                <th>Strength (MG)</th>

                 <th class="text-center">Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($currentItems as $currentItem)
                <tr>
                    <td>{{ $currentItem->source }}</td>
                    <td>{{ $currentItem->brandName }}</td>
                    <td>{{ $currentItem->itemType }}</td>
                    <td>{{ $currentItem->quantity }}</td>
                    <td>{{ $currentItem->strength }}</td>

                    <td class="text-center">
                        @if($order->order_placed == 0)
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-database"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a ><i class="icon-database-remove"></i></b>Remove Item</a></li>
                                        <li><a href="#"><i class="icon-database-edit2"></i>Modify Item</a></li>
                                        <li><span class="divider"></span></li>
                                    </ul>
                                </li>
                            </ul>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->
@endsection