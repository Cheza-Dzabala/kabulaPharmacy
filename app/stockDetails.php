<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stockDetails extends Model
{
    //
    protected $table = 'stockDetails';

    protected $fillable = [
        'orderId',
        'stockId',
        'expirationDate',
        'quantity',
        'batchNumber',
        'markup',
        'purchaseCost',
        'expiry_date',
    ];
}
