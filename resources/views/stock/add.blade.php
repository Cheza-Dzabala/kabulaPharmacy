

@extends('layouts.master')

@section('pageTitle')
   Add New Stock ({{ $stockItem->brandName }})
@endsection


@section('scripts')
    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/pages/form_layouts.js') }}"></script>
    <!-- /theme JS files -->
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('partials.sidebar')
        </div>

        <div class="col-md-8">
            <!-- Basic layout-->
            <form action="{{ route('addStock.save', $stockItem->id) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="stockId" value="{{ $stockItem->id }}">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">{{ $stockItem->brandName }}</h5>
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


                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label>Quantity:</label>
                            <input type="number" class="form-control" name="quantity" placeholder="quantity">
                            @if ($errors->has('quantity'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('batchNumber') ? ' has-error' : '' }}" >
                            <label>Batch Number:</label>
                            <input type="text" class="form-control" placeholder="Batch Number" name="batchNumber">
                            @if ($errors->has('batchNumber'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('batchNumber') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="form-group{{ $errors->has('expiry_date') ? ' has-error' : '' }}">
                            <label>Expiry Date:</label>
                            <input type="date" class="form-control"  name="expiry_date">
                            @if ($errors->has('expiry_date'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('expiry_date') }}</strong>
                                    </span>
                            @endif
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


