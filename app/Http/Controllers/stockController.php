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


    public function edit_stock($id)
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

    public function add_stock($id)
    {
        $stockClass = new stockClass();
        list($taxProfiles, $departments, $orders, $genericNames, $stockTypes) = $stockClass->newStockDependencies();
        $stockItem = $stockClass->add_stock($id);
        return view('stock.add', compact('stockItem', 'orders'));
    }

    public function add_stock_save(Request $request)
    {
        $stockClass = new stockClass();
        $addStock = $stockClass->add_stock_save($request);
        return $addStock;
    }

}
