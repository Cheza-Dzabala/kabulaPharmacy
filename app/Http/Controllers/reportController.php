<?php

namespace App\Http\Controllers;

use App\Classes\reports\salesReportClass;
use Illuminate\Http\Request;

use App\Http\Requests;

class reportController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('reportsAuth');
    }

    public function index()
    {
        return view('reports.index');
    }

    public function salesReport()
    {
        $salesReportClass = new salesReportClass();
        $salesReports = $salesReportClass->index();
        return view('reports.salesReport', compact('salesReports'));
    }
}
