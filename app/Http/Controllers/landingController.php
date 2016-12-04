<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class landingController extends Controller
{
    //
    public function index()
    {
        return view('dashboard');
    }
}
