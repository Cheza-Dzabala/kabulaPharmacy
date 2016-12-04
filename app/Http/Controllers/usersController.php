<?php

namespace App\Http\Controllers;

use App\Classes\users\userClass;
use Illuminate\Http\Request;

use App\Http\Requests;

class usersController extends Controller
{
    //
    public function index()
    {
        return view('users.index');
    }

    public function newUser()
    {
        $userClass = new userClass();
        $newUser = $userClass->newUser();
        return $newUser;
    }

    public function saveNew(Request $request)
    {
        $userClass = new userClass();
        $newUser = $userClass->saveNew($request);
        return $newUser;
    }

    public function manage()
    {
        $userClass = new userClass();
        $manageUser = $userClass->manage();
        return $manageUser;
    }

    public function editUser($id)
    {
        $userClass = new userClass();
        $editUser = $userClass->editUser($id);
        return $editUser;
    }

    public function saveEdited(Request $request)
    {
        $userClass = new userClass();
        $saveEdit = $userClass->saveEdited($request);
        return $saveEdit;
    }
}
