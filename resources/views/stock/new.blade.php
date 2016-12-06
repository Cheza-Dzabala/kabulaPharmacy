

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
                    <select name="genericName" class="select">
                        <optgroup label="Generic Name">
                            @foreach($genericNames as $genericName)
                                <option value="{{ $genericName->id }}">{{ $genericName->name }} </option>
                            @endforeach
                        </optgroup>
                    </select>
                    @if ($errors->has('genericName'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('genericName') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('brandName') ? ' has-error' : '' }}" >
                    <label>Brand Name:</label>
                    <input type="text" class="form-control" placeholder="Brand Name" name="brandName">
                    @if ($errors->has('brandName'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('brandName') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}" >
                    <label>Stock Type:</label>
                    <select class="select" name="type">
                        <optgroup label="Stock Type">
                            @foreach($stockTypes as $key => $value)
                                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    @if ($errors->has('type'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
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

                <div class="form-group{{ $errors->has('strength') ? ' has-error' : '' }}" >
                    <label>Strength in Mg:</label>
                    <input type="text" class="form-control" placeholder="Strength in MG" name="strength">
                    @if ($errors->has('strength'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('strength') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('selling_units') ? ' has-error' : '' }}" >
                    <label>Selling QTY:</label>
                    <input type="number" class="form-control" name="selling_units" placeholder="selling QTY" >
                    @if ($errors->has('selling_units'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('selling_units') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('departmentId') ? ' has-error' : '' }}">
                    <label>Stock Department</label>
                    <select class="select" name="departmentId">
                        <optgroup label="Departments">
                            @foreach($departments as $key => $value)
                                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    @if ($errors->has('departmentId'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('departmentId') }}</strong>
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

                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                    <label>Price:</label>
                    <input type="number" class="form-control" name="price" placeholder="Price">
                    @if ($errors->has('price'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('taxProfile1') ? ' has-error' : '' }}">
                    <label>Tax Profile</label>
                    <select class="select" name="taxProfile1">
                        <optgroup label="Departments">
                            @foreach($taxProfiles as $key => $value)
                                <option value="{{ $value['id'] }}">{{ $value['name'] }} - {{ $value['taxablePercentage'] }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    @if ($errors->has('taxProfile1'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('taxProfile1') }}</strong>
                                    </span>
                    @endif
                </div>

                 <div class="form-group{{ $errors->has('taxProfile2') ? ' has-error' : '' }}">
                    <label>2nd Tax Profile</label>
                    <select class="select" name="taxProfile2">
                        <optgroup label="Departments">
                            @foreach($taxProfiles as $key => $value)
                                <option value="{{ $value['id'] }}">{{ $value['name'] }} - {{ $value['taxablePercentage'] }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                     @if ($errors->has('taxProfile2'))
                         <span class="help-block">
                                        <strong>{{ $errors->first('taxProfile2') }}</strong>
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

                <div class="form-group{{ $errors->has('reorderLevel') ? ' has-error' : '' }}">
                    <label>Reorder Level:</label>
                    <input type="number" class="form-control" name="reorderLevel" placeholder="Reorder Level">
                    @if ($errors->has('reorderLevel'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('reorderLevel') }}</strong>
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


