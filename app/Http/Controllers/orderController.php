<?php

namespace App\Http\Controllers;

use App\Classes\orders\orderClass;
use App\orders;

use Illuminate\Http\Request;

use App\Http\Requests;

use Vsmoraes\Pdf\Pdf as PDF;

class orderController extends Controller
{
    //
    private $pdf;

    public function __construct(PDF $pdf)
    {
        $this->middleware('orderAuth');
        $this->pdf = $pdf;
    }

    public function index()
    {
        $orderClass = new orderClass();
        $orders = $orderClass->getOrders('all');
        return view('orders.index', compact('orders'));
    }

    public function save_order(Requests\newOrderRequest $request)
    {
        $orderClass = new orderClass();
        $newOrder = $orderClass->saveOrder($request);
        return $newOrder;
    }

    public function allDetails($id)
    {
        $orderClass = new orderClass();
        $details = $orderClass->allDetails($id);
        return $details;
    }

    public function stockAdd($id)
    {
        $orderClass = new orderClass();
        $addStock = $orderClass->stockAdd($id);
        return $addStock;
    }

    public function stockAddSave(Request $request)
    {
        $orderClass = new orderClass();
        $stockSaveOrder = $orderClass->stockAddSave($request);
        return $stockSaveOrder;
    }

    public function productAddSave(Request $request)
    {
        $orderClass = new orderClass();
        $productAddSave = $orderClass->productAddSave($request);
        return $productAddSave;
    }


    public function productAdd($id)
    {
        $orderClass = new orderClass();
        $addProduct = $orderClass->productAdd($id);
        return $addProduct;
    }

    public function generateOrder($id)
    {
        $orderClass = new orderClass();
        list($order, $supplier, $orderDetails, $notes) = $orderClass->generateOrder($id);
        return view('orders.generate.new', compact('order', 'supplier', 'orderDetails', 'notes'));
    }

    public function placeOrder($id)
    {
        $orderClass = new orderClass();
        $place = $orderClass->placeOrder($id);
        return $place;
    }

    public function activate($id)
    {
        $orderClass = new orderClass();
        $activate = $orderClass->activate($id);
        return $activate;
    }

    public function getPdf($id)
    {
        $orderClass = new orderClass();
        list($order, $supplier, $orderDetails, $notes) = $orderClass->generateOrder($id);

        $html = view('orders.generate.new', compact('order', 'supplier', 'orderDetails', 'notes'))->render();
        return $this->pdf
            ->load($html)
            ->show();


     //   return view('orders.pdf.order', compact('order', 'supplier', 'orderDetails', 'notes'));
    }
}
