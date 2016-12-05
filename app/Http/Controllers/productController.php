<?php

namespace App\Http\Controllers;

use App\genericNames;
use App\products;
use App\stockTypes;
use Illuminate\Http\Request;

use App\Http\Requests;

class productController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('productsAuth');
    }

    public function index()
    {
        $products = products::get();
        $generic_names = genericNames::get();
        foreach ($products as $product)
        {
            $generic_name = genericNames::whereId($product->generic_name_id)->first();
            $type = stockTypes::whereId($product->type)->first();
            $product = array_add($product, 'generic_name', $generic_name->name);
            $product = array_add($product, 'typeName', $type->name);
        }
        $types = stockTypes::get();
        return view('products.index', compact('products', 'generic_names', 'types'));
    }


    public function save(Request $request)
    {
        //dd($request);
        products::create([
            'generic_name_id' => $request->generic_name,
            'brand_name' => $request->brand_name,
            'type' => $request->type
        ]);

        return redirect()->route('products');
    }
}
