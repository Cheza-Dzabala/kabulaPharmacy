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
use Illuminate\Support\Facades\Hash;

class userClass
{
    public function newUser()
    {
        $roles = Role::get();
        return view('users.new', compact('roles'));
    }


    public function saveNew($request)
    {
        $role = Role::whereId($request->role)->first();

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->designation = $request->designation;
        $user->id_number = $request->id_number;
        $user->employment_date = $request->employment_date;
        $user->save();

        $user->attachRole($role);

        return redirect()->route('users.manage');
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
        $userRole = $user->roles()->first();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function saveEdited($request)
    {
        //dd($request);
        $role = Role::whereId($request->role)->first();
        $user = User::whereId($request->id)->first();

        $user->detachRoles($user->roles); //Removed Associated Roles
        $user->attachRole($role); //Attach New Role

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->designation = $request->designation;
        $user->id_number = $request->id_number;
        $user->employment_date = $request->employment_date;
        $user->save();

        return redirect()->route('users.manage');
    }

}