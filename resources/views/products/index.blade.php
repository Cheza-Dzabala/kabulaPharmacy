
@extends('layouts.master')

@section('pageTitle')
    Products
@endsection


@section('quick-tools')
    <a><button type="button" class="btn bg-teal-400 btn-labeled" data-toggle="modal" data-target="#new_product"><b><i class="icon-plus22"></i></b> Create New Product</button></a>

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
            <h5 class="panel-title">Products</h5>
            <div class="heading-elements">

            </div>
        </div>

        <div class="panel-body">
            The table below is a list of all products currently recorded in the system.
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>Product Brand Name</th>
                <th>Product Generic Name</th>
                <th>Product Type</th>
                <th class="text-center">Actions</th>
                <th class="text-center"></th>
                <th class="text-center"></th>
                <th class="text-center"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->brand_name}}</td>
                    <td>{{ $product->generic_name}}</td>
                    <td>{{ $product->typeName}}</td>
                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-file-pdf"></i> Add to Order</a></li>
                                </ul>
                            </li>
                        </ul>
                    </td>
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

@include('partials.modals.products.new')