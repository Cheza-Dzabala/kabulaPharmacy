
@extends('layouts.master')

@section('scripts')

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>


    <script type="text/javascript" src="{{ asset('assets/js/pages/invoice_template.js') }}"></script>
    <!-- /theme JS files -->
@endsection
@section('content')
    <!-- Invoice template -->
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title">Order</h6>
        </div>

        <div class="panel-body no-padding-bottom">
            <div class="row">
                <div class="col-md-6 content-group">
                    <!--
                    <img src="assets/images/logo_demo.png" class="content-group mt-10" alt="" style="width: 120px;">
                    -->
                    <div>
                        <h6>
                            Kabula Pharmacy
                        </h6>
                    </div>
                    <ul class="list-condensed list-unstyled">
                        <li>Ginnery Corner</li>
                        <li>Blantyre, Malawi</li>
                        <li>01 672 767 </li>
                    </ul>
                </div>

                <div class="col-md-6 content-group">
                    <div class="invoice-details">
                        <h5 class="text-uppercase text-semibold">Order #{{ $order->id }}</h5>
                        <ul class="list-condensed list-unstyled">
                            <li>Date: <span class="text-semibold">{{ \Carbon\Carbon::now()->toDateString() }}</span></li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-9 content-group">
                    <span class="text-muted">Order To:</span>
                    <ul class="list-condensed list-unstyled">
                        <li><h5><Attention></Attention> Attention : {{ $supplier->primaryContactPerson   }}</h5></li>
                        <li><span class="text-semibold">{{ $supplier->supplierName }}</span></li>
                        <li>{{ $supplier->address }}</li>
                        <li><a href="#">{{ $supplier->primaryPhonenumber }}</a></li>
                        <li><a href="#">{{ $supplier->primaryEmail }}</a></li>
                        <li><a href="#">{{ $supplier->city }}</a></li>
                    </ul>
                </div>


            </div>
        </div>
        <div class="panel-body">
            <h6>Order Notes</h6>
            <p class="text-muted">
                {{ $notes->value }}
            </p>
        </div>
        <div class="table-responsive">
            <table class="table table-lg">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Strength (MG)</th>
                    <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orderDetails as $detail)
                    <tr>
                        <td>{{ $detail->brandName }}</td>
                        <td>{{ $detail->itemType }}</td>
                        <td>{{ $detail->strength }}</td>
                        <td>{{ $detail->quantity }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="panel-body">
            <div class="row invoice-payment">
                <div class="col-sm-7">
                    <div class="content-group">
                        <h6>Kabula Phramacy</h6>
                        <div class="mb-15 mt-15">
                            <!--
                            <img src="assets/images/signature.png" class="display-block" style="width: 150px;" alt="">
                            -->
                        </div>

                        <ul class="list-condensed list-unstyled text-muted">
                            <li>Prepared By: {{ Auth::user()['name'] }}</li>
                            <li>Ginnery Corner</li>
                            <li>Blantyre, Malawi</li>
                            <li>01 672 767 </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /invoice template -->

@endsection