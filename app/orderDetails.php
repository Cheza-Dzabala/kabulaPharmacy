<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderDetails extends Model
{
    //
    protected $table = 'orderDetails';

    protected $fillable = [
       'order_id', 'stock_item', 'product_item', 'quantity', 'purchase_cost', 'strength'
    ];
}
