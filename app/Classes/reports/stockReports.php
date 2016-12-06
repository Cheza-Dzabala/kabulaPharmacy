<?php
/**
 * Created by PhpStorm.
 * User: Cheza
 * Date: 12/6/2016
 * Time: 10:44 AM
 */

namespace App\Classes\reports;


use App\orderDetails;
use App\orders;
use App\stock;
use App\stockDetails;
use App\suppliers;
use Carbon\Carbon;

class stockReports
{
    public function index()
    {
        $stockDetails = stockDetails::get();

        foreach ($stockDetails as $detail)
        {
            $stock = stock::whereId($detail->stockId)->first();
            $order = orders::whereId($detail->orderId)->first();
            $supplier = suppliers::whereId($order->supplier)->first();
            $detail = array_add($detail, 'stockItem', $stock->brandName.' ('.$stock->strength.' mg)');
            $detail = array_add($detail, 'supplier', $supplier->supplierName.' (#'.$supplier->id.')');
            $date = Carbon::parse($detail->created_at)->toDateString();
            $detail = array_add($detail, 'date_created', $date);
        }

        //dd($stockDetails);
        return $stockDetails;
    }
}