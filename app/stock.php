<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    //
    protected $table = 'stock';

    protected $fillable =
        [
            'orderId',
            'genericName',
            'brandName',
            'departmentId',
            'taxProfile1',
            'taxProfile2',
            'quantity',
            'reorderLevel',
            'type',
            'strength',
            'currentLevel',
            'price',
            'selling_units',
        ];
}
