<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suppliers extends Model
{
    //
    protected $table = 'suppliers';

    protected $fillable =
        [
            'supplierName', 'address', 'primaryContactPerson', 'primaryPhonenumber',
            'primaryEmail', 'secondaryPhonenumber', 'secondaryEmail', 'city'
        ];
}
