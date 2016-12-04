<?php
/**
 * Created by PhpStorm.
 * User: Cheza
 * Date: 12/3/2016
 * Time: 2:49 PM
 */

namespace App\Classes\users;


use App\Role;
use App\User;

class userClass
{
    public function newUser()
    {
        $roles = Role::get();
        return view('users.new', compact('roles'));
    }

    public function manage()
    {
        $users = User::get();
        return view('users.manage', compact('users'));
    }

    public function editUser($id)
    {
        $roles = Role::get();
        $user = User::whereId($id)->first();

        foreach ($roles as $role)
        {
            if ($user->hasRole($role))
            {
                $userRole = $role;
            }
        }

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

}