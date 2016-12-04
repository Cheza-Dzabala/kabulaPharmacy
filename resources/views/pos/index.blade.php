@extends('layouts.master')

@section('pageTitle')
    P.O.S
@endsection

@section('scripts')
    <!-- Theme JS files -->
    <script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript" src="assets/js/functions/pos/keypad.js"></script>
    <script type="text/javascript" src="assets/js/functions/pos/till.js"></script>
    <script type="text/javascript" src="assets/js/functions/pos/checkout.js"></script>
    <!-- /theme JS files -->
@endsection

@section('content')
    <div class="row">
        @include('partials.pos.items')
        @include('partials.pos.keypad')
        @include('partials.pos.checkoutForm')
    </div>
@endsection