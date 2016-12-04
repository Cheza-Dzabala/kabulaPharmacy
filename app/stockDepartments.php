<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stockDepartments extends Model
{
    //
    protected $table = 'stockDepartments';

    protected $fillable = [
        'departmentLabel', 'description', 'name', 'createdBy'
    ];
}
