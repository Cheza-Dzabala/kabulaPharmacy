

@extends('layouts.master')

@section('pageTitle')
    Update {{ $stock->brandName }}
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
            {!! Form::open() !!}
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


                        <div class="form-group{{ $errors->has('genericName') ? ' has-error' : '' }}" >
                            <label>Generic Name:</label>
                            <select name="genericName" class="select">
                                <optgroup label="Orders">
                                    <option></option>
                                    @foreach($genericNames as $genericName)
                                        <option value="{{ $genericName->id }}" @if($genericName['id'] == $stock->genericName) selected @endif>{{ $genericName->name }} </option>
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
                            <input type="text" class="form-control" placeholder="Brand Name" name="brandName" value="{{ $stock->brandName }}">
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
                                    <option></option>
                                    @foreach($stockTypes as $key => $value)
                                        <option value="{{ $value['id'] }}" @if($value['id'] == $stock->type) selected @endif>{{ $value['name'] }}</option>
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
                            <input type="text" class="form-control" placeholder="batch Number" name="batchNumber" value="{{ $stock->batchNumber }}">
                            @if ($errors->has('batchNumber'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('batchNumber') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('strength') ? ' has-error' : '' }}" >
                            <label>Strength in Mg:</label>
                            <input type="text" class="form-control" placeholder="Strength in MG" name="strength" value="{{ $stock->strength }}">
                            @if ($errors->has('strength'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('strength') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('departmentId') ? ' has-error' : '' }}">
                            <label>Stock Department</label>
                            <select class="select" name="departmentId">
                                <optgroup label="Departments">
                                    @foreach($departments as $key => $value)
                                        <option value="{{ $value['id'] }}"  @if($value['id'] == $stock->departmentId) selected @endif>{{ $value['name'] }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @if ($errors->has('departmentId'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('departmentId') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <h5 class="panel-title">Pricing Details</h5>

                        <div class="form-group{{ $errors->has('purchaseCost') ? ' has-error' : '' }}">
                            <label>Purchase Cost:</label>
                            <input type="number" class="form-control" name="purchaseCost" placeholder="Purchase Cost" value="{{ $stock->purchaseCost }}">
                            @if ($errors->has('purchaseCost'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('purchaseCost') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('markup') ? ' has-error' : '' }}" >
                            <label>Profit Percentage:</label>
                            <input type="number" class="form-control" name="markup" placeholder="Profit Percentage" value="{{ $stock->markup }}">
                            @if ($errors->has('markup'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('markup') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('taxProfile1') ? ' has-error' : '' }}">
                            <label>Tax Profile</label>
                            <select class="select" name="taxProfile1">
                                <optgroup label="Departments">
                                    @foreach($taxProfiles as $key => $value)
                                        <option value="{{ $value['id'] }}"  @if($value['id'] == $stock->taxProfile1) selected @endif>{{ $value['name'] }} - {{ $value['taxablePercentage'] }}</option>
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
                                        <option value="{{ $value['id'] }}"  @if($value['id'] == $stock->taxProfile2) selected @endif>{{ $value['name'] }} - {{ $value['taxablePercentage'] }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @if ($errors->has('taxProfile2'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('taxProfile2') }}</strong>
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


