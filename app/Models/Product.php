<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'make_id',
        'model_id',
        'type_id',
        'barcode',
        'stock_code',
        'nomenclature',
        'original_description',
        'detailed_description',
        'in_stock',
        'dealer_price',
        'retail_price',
        'manufacture'
    ];
}
