<?php
namespace App\Classes\orders;

use App\config;
use App\Http\Requests\newOrderRequest;
use App\orderDetails;
use App\orders;
use App\products;
use App\stock;
use App\stockTypes;
use App\suppliers;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderClass {

    public function saveOrder(newOrderRequest $request)
    {
        orders::create([
           'supplier' => $request['supplier'],
           'isActive' => 0,
            'createdBy' => Auth::user()['id']
        ]);

        $request->session()->flash('success', 'Successfully saved Order.');
        return redirect()->route('orders');
    }

    public function getOrders($type)
    {
        if($type == 'all')
        {
            $orders = orders::get()->toArray();
        }
            elseif ($type == 'active')
        {
            $orders = orders::Active()->get();
        }


        foreach ($orders as $key => $value) {
            $user = User::whereId($value['createdBy'])->get()->first();
            $orders[$key] = array_add($orders[$key], 'user', $user['name']);

            $supplier = suppliers::whereId($value['supplier'])->get()->first();
            $orders[$key] = array_add($orders[$key], 'supplierName', $supplier['supplierName']);
        }
        return $orders;
    }


    public function allDetails($id)
    {
        $order = orders::whereId($id)->first();
        $currentItems = orderDetails::whereOrderId($id)->get();
        foreach ($currentItems as $currentItem)
        {
            if($currentItem->stock_item != null)
            {
                $item = stock::whereId($currentItem->stock_item)->first();
                $itemType = stockTypes::whereId($item->type)->first();

                $currentItem = array_add($currentItem, 'brandName', $item->brandName);
                $currentItem = array_add($currentItem, 'itemType', $itemType->name);
                $currentItem = array_add($currentItem, 'source', 'Stock');
            }else{
                $item = products::whereId($currentItem->product_item)->first();
                $itemType = stockTypes::whereId($item->type)->first();
                $currentItem = array_add($currentItem, 'brandName', $item->brand_name);
                $currentItem = array_add($currentItem, 'itemType', $itemType->name);
                $currentItem = array_add($currentItem, 'source', 'Product Database');
            }
        }
        return view('orders.details', compact('currentItems', 'id', 'order'));
    }

    public function stockAdd($id)
    {
        $stocks = stock::get();
        foreach ($stocks as $stock)
        {
            $type = stockTypes::whereId($stock->type)->first();
            array_add($stock, 'typeName', $type->name);
        }
        return view('orders.add.stock', compact('stocks', 'id'));
    }

    public function stockAddSave(Request $request)
    {
    //  dd($request);
        $selected = $request->selected;
        $mainArray = [];
        $i = 0;

        foreach ($selected as $key => $value)
        {
            $order = [];
            $name = $request->name[$key];
            $item = $request->item[$key];
            $strength = $request->strength[$key];
            $type = $request->type[$key];
            $quantity = $request->quantity[$key];
            $purchaseCost = $request->purchaseCost[$key];

            $order = array_add($order, 'name', $name);
            $order = array_add($order, 'id', $item);
            $order = array_add($order, 'strength', $strength);
            $order = array_add($order, 'type', $type);
            $order = array_add($order, 'quantity', $quantity);
            $order = array_add($order, 'purchaseCost', $purchaseCost);
            $mainArray = array_add($mainArray, $i, $order);
            $i++;
        }
       // dd($mainArray);

        foreach ($mainArray as $key => $value)
        {
            orderDetails::create([
               'order_id' => $request->orderId,
                'stock_item' => $value['id'],
                'product_item' => null,
                'quantity' => $value['quantity'],
                'strength' => $value['strength'],
                'purchase_cost' => $value['purchaseCost']
            ]);

        }

        return redirect()->route('order.details', $request->orderId);
    }

    public function productAddSave(Request $request)
    {
    //  dd($request);
        $selected = $request->selected;
        $mainArray = [];
        $i = 0;

        foreach ($selected as $key => $value)
        {
            $order = [];
            $name = $request->name[$key];
            $item = $request->item[$key];
            $strength = $request->strength[$key];
            $type = $request->type[$key];
            $quantity = $request->quantity[$key];


            $order = array_add($order, 'name', $name);
            $order = array_add($order, 'id', $item);
            $order = array_add($order, 'strength', $strength);
            $order = array_add($order, 'type', $type);
            $order = array_add($order, 'quantity', $quantity);
            $mainArray = array_add($mainArray, $i, $order);
            $i++;
        }
      // dd($mainArray);

        foreach ($mainArray as $key => $value)
        {
            orderDetails::create([
               'order_id' => $request->orderId,
                'stock_item' => null,
                'product_item' => $value['id'],
                'quantity' => $value['quantity'],
                'strength' => $value['strength'],
            ]);
        }

        return redirect()->route('order.details', $request->orderId);
    }



    public function productAdd($id)
    {
        $products = products::get();

        foreach ($products as $product)
        {
            $type = stockTypes::whereId($product->type)->first();
            array_add($product, 'typeName', $type->name);
        }

        return view('orders.add.products', compact('products', 'id'));
    }

    public function generateOrder($id)
    {
        $order = orders::whereId($id)->first();
        $supplier = suppliers::whereId($order->supplier)->first();
        $orderDetails = orderDetails::whereOrderId($id)->get();
        $notes = config::whereName('order_notes')->first();
        foreach ($orderDetails as $detail)
        {
                if($detail->stock_item != null)
                {
                    $item = stock::whereId($detail->stock_item)->first();
                    $itemType = stockTypes::whereId($item->type)->first();
                    $detail = array_add($detail, 'brandName', $item->brandName);
                    $detail = array_add($detail, 'itemType', $itemType->name);
                }else{
                    $item = products::whereId($detail->product_item)->first();
                    $itemType = stockTypes::whereId($item->type)->first();
                    $detail = array_add($detail, 'brandName', $item->brand_name);
                    $detail = array_add($detail, 'itemType', $itemType->name);
                }
        }

        return array($order, $supplier, $orderDetails, $notes);

    }

    public function placeOrder($id)
    {
        $order = orders::whereId($id)->first();
        $order->order_placed = 1;
        $order->save();
        return redirect()->route('order.details', $id);
    }

    public function activate($id)
    {
        $order = orders::whereId($id)->first();
        $order->isActive = 1;
        $order->save();
        return redirect()->route('orders');
    }
}
