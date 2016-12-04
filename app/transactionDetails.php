<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transactionDetails extends Model
{
    //
    protected $table = 'transactionStock';

    protected $fillable =
        [
            'transactionId', 'stockId', 'stockAmount', 'purchaseMarkup'
        ];
}
