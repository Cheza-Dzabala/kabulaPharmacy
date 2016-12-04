<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 8/30/16
 * Time: 9:12 PM
 */

namespace App\Classes\pos;

use App\Http\Requests\Request;
use App\stock;
use App\stockDetails;
use App\transactionDetails;
use App\transactions;
use Illuminate\Support\Facades\Auth;

class posClass {
    public function processTransaction(\Illuminate\Http\Request $request)
    {
        $transaction = transactions::create([
            'amount' => $request['amount'],
            'createdBy' => Auth::user()['id'],
        ]);

        $purchasedItems =  [];

        $transactionId = $transaction->id;

        foreach ($request['stockItem'] as $key => $value)
        {
            $stock = stock::whereId($key)->first();
            $stock->currentLevel = $stock->currentLevel - $value;
            $stock->save();

            $details = stockDetails::whereStockid($key)->first();

            transactionDetails::create([
                'transactionId' => $transactionId,
                'stockId' => $key,
                'stockAmount' => $value,
                'purchaseMarkup' => $details->markup
            ]);



            $stockArray = array(
                'purchaseAmount' => $value,
                'purchaseCost' => (($details->markup / 100) * $details->purchaseCost) * $value,
            );

            $purchasedItems = array_add($purchasedItems, $stock->brandName, $stockArray);
        }
       //dd($purchasedItems);

        $transactionAmount = $request['amount'];
        $amountTendered = $request['tenderedAmount'];
        $changeDue = $amountTendered - $transactionAmount;

        return view('pos.transactionDetails', compact('amountTendered', 'transactionAmount', 'changeDue', 'purchasedItems'));

    }

}