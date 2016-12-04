<?php
/**
 * Created by PhpStorm.
 * User: Cheza
 * Date: 12/3/2016
 * Time: 1:48 PM
 */

namespace App\Classes;


use App\Permission;
use App\Role;

class rolesClass
{
    public function rolesIndex()
    {
        $roles = Role::get();
        return view('config.roles.index', compact('roles'));
    }

    public function rolesAttachPermissions($roleName)
    {
        $permissions = Permission::get();
        $role = Role::whereName($roleName)->first();
        $rolePerms = $role->perms()->get();
        return view('config.roles.attachPermission', compact('role', 'permissions', 'rolePerms'));
    }

    public function rolesSaveAttachment($request)
    {
        $role = Role::whereId($request->role_id)->first();
        $role->perms()->sync([]); // Delete relationship data
        foreach ($request->selected as $key =>  $value)
        {
            $permission = Permission::whereId($request->permissionId[$key])->first();
            $role->attachPermission($permission);
        }

        $roles = Role::get();
        return view('config.roles.index', compact('roles'));
    }

}