<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Entities
 * @mixin \Eloquent
 */
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
        'translated_description',
        'in_stock',
        'dealer_price',
        'retail_price',
        'manufacture'
    ];

    /**
     * Get the type record associated with the product.
     */
    public function type()
    {
        return $this->hasOne('App\Entities\Type', 'id', 'type_id');
    }

    /**
     * Get the model record associated with the product.
     */
    public function model()
    {
        return $this->belongsTo('App\Entities\MakeModel', 'model_id', 'id');
    }

    /**
     * Get the type make associated with the product.
     */
    public function make()
    {
        return $this->belongsTo('App\Entities\Make', 'make_id', 'id');
    }
}
