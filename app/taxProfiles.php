<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class taxProfiles extends Model
{
    //
    protected $table = 'taxProfiles';

    protected $fillable = [
      'name', 'taxablePercentage', 'description', 'createdBy'
    ];
}
