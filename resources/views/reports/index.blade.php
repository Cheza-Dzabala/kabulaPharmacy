@extends('layouts.master')


@section('pageTitle')
    System Configuration
@endsection



@section('content')
    <div class="row">
        <div class="panel panel-flat">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="category-content">
                        <button class="btn bg-teal-300 btn-block btn-float btn-float-lg" type="button"  data-toggle="modal" data-target="#stockConfigModal">
                            <i class="icon-pie-chart7"></i> <span>Stock Reports</span>
                        </button>
                        <a href="{{ route('sales.reports') }}" class="btn bg-teal-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-cash4"></i> <span>Sales Reports</span></a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="category-content">
                        <button class="btn bg-teal-600 btn-block btn-float btn-float-lg" type="button"><i class="icon-drawer-in"></i> <span>Suppliers Reports</span></button>
                        <button class="btn bg-teal-700 btn-block btn-float btn-float-lg" type="button"><i class="icon-users4"></i> <span>Users & User Reports</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- /tabs with bottom line -->

@endsection
