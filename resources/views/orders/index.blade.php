
@extends('layouts.master')

@section('pageTitle')
    Orders
@endsection


@section('quick-tools')
    <a><button type="button" class="btn bg-teal-400 btn-labeled" data-toggle="modal" data-target="#neworder"><b><i class="icon-plus22"></i></b> Create New Order</button></a>

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
            <h5 class="panel-title">Order</h5>
            <div class="heading-elements">

            </div>
        </div>

        <div class="panel-body">
            The table below is a list of all orders currently recorded in the system.
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>Order ID</th>
                <th>Is Active</th>
                <th>Supplier</th>
                <th>Date Created</th>
                <th>Created By</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $key=>$value)
                <tr>
                    <td>
                        {{ $value['id'] }}
                    </td>
                    <td>
                        @if($value['isActive'] == 1)
                            Active
                        @else
                            Inactive
                        @endif
                    </td>
                    <td>{{$value['supplierName']}}</td>
                    <td>{{$value['created_at']}}</td>
                    <td>{{$value['user']}}</td>
                    <td>

                        <a href="{{route('order.details',$value['id'])}}">
                            <button type="button" class="btn bg-teal-400 btn-labeled"><b><i class="icon-cog"></i></b>
                                 Manage Order
                            </button>
                        </a>

                        @if($value['order_placed'] == 1)
                           @if($value['isActive'] == 0)
                                <a href="{{ route('orders.activate', $value['id']) }}">
                                    <button type="button" class="btn bg-info-800 btn-labeled"><b><i class="icon-cog"></i></b>
                                        Activate Order (If You Have Received Products)
                                    </button>
                                </a>
                           @endif
                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

@endsection

@include('partials.modals.orders.new')