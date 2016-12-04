

@extends('layouts.master')

@section('pageTitle')
    New Supplier
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
            <form action="{{ route('save-supplier') }}" method="post">
                {{ csrf_field() }}
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Supplier Details</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">

                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-groupform-group{{ $errors->has('supplierName') ? ' has-error' : '' }}">
                            <label>Supplier Name:</label>
                            <input type="text" class="form-control" name="supplierName" placeholder="Supplier Name">
                            @if ($errors->has('supplierName'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('supplierName') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label>Supplier Address</label>
                            <textarea class="form-control"  name="address" placeholder="Address"></textarea>
                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('primaryContactPerson') ? ' has-error' : '' }}">
                            <label>Primary Contact Person:</label>
                            <input type="text" class="form-control"   name="primaryContactPerson" placeholder="Primary Contact Person">
                            @if ($errors->has('primaryContactPerson'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('primaryContactPerson') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('primaryPhonenumber') ? ' has-error' : '' }}">
                            <label>Primary Phone Number:</label>
                            <input type="text" class="form-control"   name="primaryPhonenumber" placeholder="Primary Phone Number">
                            @if ($errors->has('primaryPhonenumber'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('primaryPhonenumber') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('primaryEmail') ? ' has-error' : '' }}">
                            <label>Primary Email:</label>
                            <input type="email" class="form-control"   name="primaryEmail" placeholder="Primary Email">
                            @if ($errors->has('primaryEmail'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('primaryEmail') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('secondaryPhonenumber') ? ' has-error' : '' }}">
                            <label>Secondary Phone Number:</label>
                            <input type="text" class="form-control"   name="secondaryPhonenumber" placeholder="Secondary Phone Number">
                            @if ($errors->has('secondaryPhonenumber'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('secondaryPhonenumber') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('secondaryEmail') ? ' has-error' : '' }}">
                            <label>Secondary Email:</label>
                            <input type="email" class="form-control"   name="secondaryEmail" placeholder="Secondary Email">
                            @if ($errors->has('secondaryEmail'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('secondaryEmail') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label>City:</label>
                            <input type="text" class="form-control"   name="city" placeholder="City">
                        </div>
                        <button type="submit" class="btn btn-lg bg-teal pull-right">Save Supplier</button>
                        @if ($errors->has('city'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </form>
            <!-- /basic layout -->
        </div>
    </div>
@endsection


