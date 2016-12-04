@extends('layouts.master')


@section('pageTitle')
    Attach Permissions To {{ $role->display_name }}
@endsection



@section('content')

    <div class="row">
        <div class="panel panel-flat">
            <div class="panel-body">
                <form action="{{ route('config-roles.attach.save', $role->name) }}" method="post">
                    {{ csrf_field() }}
                    <?php $i = 0 ?>
                    <input type="hidden" name="role_id" value="{{ $role->id }}">
                    <table class="table table-md invoice-archive">
                        <thead>
                        <th></th>
                        <th class="col-sm-6">Permission Name</th>
                        <th>Description</th>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>

                                    <input type="checkbox" name="selected[{{ $i }}]" class="form-control"

                                           @foreach($rolePerms as $rolePerm)
                                               @if($permission->name == $rolePerm->name)
                                               checked
                                                @endif
                                            @endforeach
                                    >
                                    <input type="hidden" name="permissionId[{{ $i }}]" value="{{ $permission->id }}">
                                </td>
                                <td>{{ $permission->display_name }}</td>
                                <td>{{ $permission->description }}</td>
                            </tr>
                            <?php $i++ ?>
                        @endforeach
                        </tbody>
                    </table>
                    <button class="btn bg-success-300 btn-block btn-float btn-float-md"  type="submit   ">
                        <i class="icon-attachment"></i> <span>Attach Permissions {{ $role->display_name }} Role</span>
                    </button>
                </form>

            </div>
        </div>
    </div>

    <!-- /tabs with bottom line -->

@endsection

