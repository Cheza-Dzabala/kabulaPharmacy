<?php

namespace App\Http\Controllers;


use App\Classes\stock\stockClass;
use App\Http\Requests\newStockRequest;
use App\stock;
use Illuminate\Http\Request;


class stockController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('stockAuth');
    }

    public function index()
    {
        $stockClass = new stockClass();
        $stock = $stockClass->get_stock();
        return view('stock.index', compact('stock'));
    }

    public function new_stock()
    {
        $stockDependencies = new stockClass();
        list($taxProfiles, $departments, $orders, $genericNames, $stockTypes) = $stockDependencies->newStockDependencies();
        return view('stock.new', compact('taxProfiles', 'departments', 'orders', 'genericNames', 'stockTypes'));
    }

    public function save_stock(newStockRequest $request)
    {
        $stockClass = new stockClass();
        $stock = $stockClass->saveNewStock($request);
        return $stock;
    }


    public function add_stock($id)
    {
        $stockDependencies = new stockClass();
        list($taxProfiles, $departments, $orders, $genericNames, $stockTypes) = $stockDependencies->newStockDependencies();
        $stock = stock::whereId($id)->first();
        return view('stock.update', compact('taxProfiles', 'departments', 'orders', 'genericNames', 'stockTypes', 'stock'));
    }


    public function update_stock(Request $request, $id)
    {
        $stockClass = new stockClass();
        $updateStockItem = $stockClass->updateStockItem($request, $id);
        return $updateStockItem;
    }

}
