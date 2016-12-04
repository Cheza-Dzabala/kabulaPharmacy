<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    //
    protected $table = 'products';

    protected $fillable = [
      'generic_name_id', 'brand_name', 'type',
    ];
}
