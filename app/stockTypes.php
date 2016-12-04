<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stockTypes extends Model
{
    //
    protected $table = 'stockTypes';

    protected $fillable = [
        'name'
    ];
}
