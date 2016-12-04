@extends('layouts.master')


@section('pageTitle')
    Roles
@endsection



@section('content')

    <div class="row">

        <div class="panel panel-flat">
            <div class="panel-body">
              <table class="table table-md invoice-archive">
                  <thead>
                  <button class="btn bg-indigo-600 btn-float-sm pull-right" type="button" data-toggle="modal" data-target="#newRole">
                      <i class="icon-new"></i> <span>New Role</span>
                  </button>
                    <th class="col-sm-6">Role Name</th>
                    <th>Description</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->display_name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                <a href="{{ route('config-roles.attach', $role->name) }}" class="btn bg-success-600  btn-float btn-float-sm"  type="button">
                                    <i class="icon-attachment"></i> <span>Attach Permissions</span>
                                </a>

                                <button class="btn bg-primary-300 btn-float btn-float-sm"  type="button">
                                    <i class="icon-pencil"></i> <span>Edit Role</span>
                                </button>

                                <button class="btn bg-danger-600 btn-float btn-float-sm" type="button">
                                    <i class="icon-diff-removed"></i> <span>Delete Role</span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
        </div>
    </div>

    <!-- /tabs with bottom line -->

@endsection

@include('partials.modals.roles.newRole')