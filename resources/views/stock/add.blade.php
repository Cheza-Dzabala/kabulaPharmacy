

@extends('layouts.master')

@section('pageTitle')
    New Stock
@endsection


@section('scripts')
    <!-- Theme JS files -->
    <script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="assets/js/pages/form_layouts.js"></script>
    <!-- /theme JS files -->
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('partials.sidebar')
        </div>

        <div class="col-md-8">
            <!-- Basic layout-->
            <form action="{{ route('saveStock') }}" method="post">
                {{ csrf_field() }}
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Stock Details</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">

                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('orderId') ? ' has-error' : '' }}">
                            <label>Associated Order</label>
                            <select name="orderId" class="select">
                                <optgroup label="Orders">
                                    @foreach($orders as $key => $value)
                                        <option value="{{ $value['id'] }}">{{ $value['supplierName'] }} Order #{{ $value['id'] }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @if ($errors->has('orderId'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('orderId') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('genericName') ? ' has-error' : '' }}" >
                            <label>Generic Name:</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="form-group{{ $errors->has('strength') ? ' has-error' : '' }}" >
                            <label>Strength in Mg:</label>
                            <input type="text" class="form-control" placeholder="Strength in MG" name="strength">
                        </div>


                        <h5 class="panel-title">Pricing Details</h5>

                        <div class="form-group{{ $errors->has('purchaseCost') ? ' has-error' : '' }}">
                            <label>Purchase Cost:</label>
                            <input type="number" class="form-control" name="purchaseCost" placeholder="Purchase Cost">
                            @if ($errors->has('purchaseCost'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('purchaseCost') }}</strong>
                                    </span>
                            @endif
                        </div>




                        <h5 class="panel-title">Order Details</h5>

                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label>Quantity:</label>
                            <input type="number" class="form-control" name="quantity" placeholder="quantity">
                            @if ($errors->has('quantity'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
                        </div>

                    </div>
                </div>
            </form>
            <!-- /basic layout -->
        </div>
    </div>
@endsection


