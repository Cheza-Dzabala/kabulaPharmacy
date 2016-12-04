<?php
/**
 * Created by PhpStorm.
 * User: Cheza
 * Date: 11/28/2016
 * Time: 7:16 PM
 */

namespace App\Classes\reports;


use App\stock;
use App\transactionDetails;
use App\transactions;
use App\User;
use Carbon\Carbon;

class salesReportClass
{
    public function index()
    {
        $transactions = transactionDetails::get();
        //dd($transactions);
        foreach ($transactions as $transaction)
        {
            $sale = transactions::orderBy('created_at', 'DESC')->whereId($transaction->transactionId)->first();
            $saleDate = Carbon::parse($sale->created_at)->toFormattedDateString();
            $employee = User::whereId($sale->createdBy)->first();
            $item = stock::whereId($transaction->stockId)->first();
            $transaction = array_add($transaction, 'attendant', $employee->name);
            $transaction = array_add($transaction, 'amount', $sale->amount);
            $transaction = array_add($transaction, 'item', $item->brandName);
            $transaction = array_add($transaction, 'date', $saleDate);
        }
        return $transactions;
    }
}