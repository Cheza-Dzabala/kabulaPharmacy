<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    //
    protected $table = 'orders';

    protected $fillable = [
        'supplier', 'orderAmount', 'createdBy', 'isActive', 'order_placed'
    ];


    public function scopeActive($query)
    {
        return $query->whereIsactive(1);
    }
}
