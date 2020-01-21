<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManufacturerCharge extends Model
{
    protected $table = 'manufacturer_charge';

    protected $fillable = [
        'name'
    ];
}
