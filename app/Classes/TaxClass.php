<?php

namespace App\Classes;

use Illuminate\Http\Request;
use App\taxProfiles;
use App\User;
use Illuminate\Support\Facades\Auth;

class TaxClass {

    public function getTaxProfiles()
    {
        $profiles = taxProfiles::orderBy('taxablePercentage', 'ASC')->get()->toArray();
        foreach ($profiles as $key => $value) {
            $user = User::whereId($value['createdBy'])->get()->first();
            $profiles[$key] = array_add($profiles[$key], 'user', $user['name']);
        }
        return $profiles;
    }

    public function saveProfile(\App\Http\Requests\taxProfiles $request)
    {
        taxProfiles::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'taxablePercentage' => $request['taxablePercentage'],
            'createdBy' => Auth::user()['id']
        ]);
        $request->session()->flash('success', 'Successfully saved tax profile.');
        return redirect()->route('stock-tax-config');
    }


}