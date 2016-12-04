<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 8/25/16
 * Time: 9:00 AM
 */

namespace App\Classes;

use App\genericNames;
use App\Http\Requests\genericNamesRequest;

class genericNamesClass {

    public function getGenericNames()
    {
        $genericNames = genericNames::get();
        return $genericNames;
    }

    public function saveGenericName(genericNamesRequest $request)
    {
        genericNames::create([
            'name' => $request['name'],
        ]);

        $request->session()->flash('success', 'Successfully saved Generic Name.');
        return redirect()->route('stock-generic-names');
    }

}