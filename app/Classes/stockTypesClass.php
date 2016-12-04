<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 8/25/16
 * Time: 3:05 PM
 */

namespace App\Classes;

use App\Http\Requests\stockTypesRequest;
use App\stockTypes;
use Illuminate\Http\Request;

class stockTypesClass {
    public function getStockTypes ()
    {
        $stockTypes = stockTypes::get();
        return $stockTypes;
    }

    public function saveStockTypes(stockTypesRequest $request)
    {
        stockTypes::create([
            'name' => $request['name']
        ]);

        $request->session()->flash('success', 'Successfully saved stock type Name.');
        return redirect()->route('stock-generic-names');
    }


}