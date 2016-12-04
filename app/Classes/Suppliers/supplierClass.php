<?php

namespace App\Classes\Suppliers;

use App\Http\Requests\supplierRequest;
use App\suppliers;

class supplierClass{

    public function saveSupplier(supplierRequest $request)
    {
        suppliers::create([
           'supplierName' => $request['supplierName'],
            'address' => $request['address'],
            'primaryContactPerson' => $request['primaryContactPerson'],
            'primaryPhonenumber' => $request['primaryPhonenumber'],
            'primaryEmail' => $request['primaryEmail'],
            'secondaryPhonenumber' => $request['secondaryPhonenumber'],
            'secondaryEmail' => $request['secondaryEmail'],
            'city' => $request['city']
        ]);

        $request->session()->flash('success', 'Successfully saved Supplier.');
        return redirect()->route('supplier');
    }

    public function getSuppliers()
    {
        $suppliers = suppliers::get()->toArray();
        return $suppliers;
    }

}