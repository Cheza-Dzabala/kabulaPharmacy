
@extends('layouts.master')

@section('pageTitle')
    401
@endsection


@section('quick-tools')
@endsection

@section('scripts')
@endsection
@section('content')


        <!-- Error wrapper -->
        <div class="container-fluid text-center">
            <h1 class="error-title">401</h1>
            <h6 class="text-semibold content-group">Oops, an error has occurred. Access DENIED!</h6>

            <a href="{{ url('/') }}" class="btn btn-primary btn-block content-group"><i class="icon-circle-left2 position-left"></i> Go to dashboard</a>


        </div>

        <!-- /error wrapper -->


    <!-- /main content -->

@endsection

