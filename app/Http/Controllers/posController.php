<?php

namespace App\Http\Controllers;

use App\Classes\pos\posClass;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class posController extends Controller
{
    //
    public function index()
    {
        return view('pos.index');
    }

    public function processTransaction(Request $request)
    {
        $posClass = new posClass();
        return $posClass->processTransaction($request);
    }
}
