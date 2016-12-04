
@extends('layouts.master')

@section('pageTitle')
    Manage Users
@endsection


@section('quick-tools')
    <a href="{{ route('users.new') }}">
        <button type="button" class="btn bg-teal-400 btn-labeled">
            <b><i class="icon-plus22"></i></b> Create New User
        </button>
    </a>
@endsection

@section('scripts')

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
    <!-- /theme JS files -->
@endsection
@section('content')
    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Manage Users</h5>
            <div class="heading-elements">

            </div>
        </div>

        <div class="panel-body">
            The table below is a list of all users currently recorded in the system. Users are viewable and editable.
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>ID Number</th>
                <th>Designation</th>
                <th>Employment Date</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>{{ $user->id_number }}</td>
                    <td>{{ $user->designation }}</td>
                    <td>{{ $user->employment_date }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn bg-primary-300 btn-float-sm"  type="button">
                            <i class="icon-pencil"></i> <span>Edit User</span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

@endsection