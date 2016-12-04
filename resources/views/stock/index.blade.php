
@extends('layouts.master')

@section('pageTitle')
    Stock
@endsection


@section('quick-tools')
    <a href="{{ route('newStock') }}"><button type="button" class="btn bg-teal-400 btn-labeled"><b><i class="icon-plus22"></i></b> Create New Stock</button></a>
    <button type="button" class="btn bg-teal-400 btn-labeled"><b><i class="icon-file-excel"></i></b> Import Excelsheet</button>

    <a href="{{ route('orders') }}"><button type="button" class="btn bg-indigo-400 btn-labeled"><b><i class="icon-drawer-out"></i></b> Create New Order</button></a>
    <button type="button" class="btn bg-indigo-400 btn-labeled"><b><i class="icon-eye"></i></b> View Past Orders</button>
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
            <h5 class="panel-title">Stock On Hand</h5>
            <div class="heading-elements">

            </div>
        </div>

        <div class="panel-body">
            The table below is a list of all stock currently recorded in the system. Stock is viewable and editable.
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>ID</th>
                <th>Generic Name</th>
                <th>Brand Name</th>
                <th>Strength in MG</th>
                <th>Stock Level</th>
                <th>Reorder Status</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stock as $key => $value)
            <tr>
                <td>{{ $value['genericName'] }}</td>
                <td>{{ $value['actualGenericName'] }}</td>
                <td>{{ $value['brandName'] }}</td>
                <td>{{ $value['strength'] }}</td>
                <td>{{ $value['currentLevel'] }}</td>
                <td>@if($value['currentLevel'] > $value['reorderLevel'])
                        <span class="label label-success">Safe</span>
                    @elseif($value['currentLevel'] == 0)
                        <span class="label label-danger">Out Of Stock</span>
                    @elseif($value['currentLevel'] < $value['reorderLevel'])
                        <span class="label label-warning">Reorder</span>
                    @endif
                </td>
                <td class="text-center">
                    <ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{!!  route('addStock', ['slug' => $value['id']]) !!}"><i class="icon-eye"></i> Manage Item</a></li>
                                <li><a href="#"><i class="icon-plus3"></i> Add Stock</a></li>
                                <li><span class="divider"></span></li>
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