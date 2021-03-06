

@extends('layouts.master')

@section('pageTitle')
    New User
@endsection


@section('scripts')
    <!-- Theme JS files -->
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

                    <form class="form-horizontal" action="{{ route('users.new.save') }}" method="post">
                        {{ csrf_field() }}
                        <legend class="text-bold">User Details</legend>
                        <div class="form-group">
                                <label class="control-label col-lg-2">Full Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-lg-2">Username</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="username" required>
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-lg-2">Password</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Image</label>
                            <div class="col-lg-10">
                                <input type="file" class="file-styled form-control" name="image">
                            </div>
                        </div>

                        <legend class="text-bold">Contact Details</legend>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Email</label>
                            <div class="col-lg-10">
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Phone Number</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="mobile" required>
                            </div>
                        </div>

                        <legend class="text-bold">Employment Details</legend>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Designation</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="designation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Id Number</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="id_number" required >
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-lg-2">Employment Date</label>
                            <div class="col-lg-10">
                                <input type="date" class="form-control" name="employment_date" required>
                            </div>
                        </div>

                        <legend class="text-bold">Security</legend>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Roles</label>
                            <div class="col-lg-10">
                                <select name="role" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <legend class="text-bold">Action</legend>
                        <button class="btn bg-primary-300 btn-block btn-float btn-float-sm"  type="submit">
                            <i class="icon-pencil"></i> <span>Save Changes</span>
                        </button>

                    </form>
            <!-- /basic layout -->
        </div>
    </div>
@endsection


