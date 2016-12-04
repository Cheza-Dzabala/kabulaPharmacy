@extends('layouts.master')


@section('pageTitle')
    System Users
@endsection



@section('content')
    <div class="row">
        <div class="panel panel-flat">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="category-content">
                        <a href="{{ route('users.new') }}" class="btn bg-teal-300 btn-block btn-float btn-float-lg" type="button"  >
                            <i class="icon-user-plus"></i> <span>New User</span>
                        </a>
                        <a href="{{ route('users.manage') }}" class="btn bg-teal-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-users2"></i> <span>Manage Users</span></a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="category-content">
                        <button class="btn bg-teal-600 btn-block btn-float btn-float-lg" type="button"><i class="icon-user-check"></i> <span>User Roles & Permissions</span></button>
                        <button class="btn bg-teal-700 btn-block btn-float btn-float-lg" type="button"><i class="icon-user-block"></i> <span>Blocked & Blacklisted</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- /tabs with bottom line -->

@endsection
