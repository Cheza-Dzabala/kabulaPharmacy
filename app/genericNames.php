<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genericNames extends Model
{
    //
    protected $table='genericNames';

    protected $fillable = [
        'name',
    ];
}
