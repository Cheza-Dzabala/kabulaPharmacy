<?php

namespace App\Http\Controllers;

use App\Classes\Suppliers\supplierClass;
use Illuminate\Http\Request;

use App\Http\Requests;

class supplierController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('supplierAuth');
    }

    public function index()
    {
        $supplierClass = new supplierClass();
        $suppliers = $supplierClass->getSuppliers();
        return view('supplier.index', compact('suppliers'));
    }

    public function new_supplier()
    {
        return view('supplier.new');
    }

    public function save_supplier(Requests\supplierRequest $request)
    {
        $supplierClass = new supplierClass();
        $newSupplier = $supplierClass->saveSupplier($request);
        return $newSupplier;
    }

}
