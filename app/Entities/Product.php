<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 *
 * @package App\Entities
 * @mixin \Eloquent
 * @property int $id
 * @property int $make_id
 * @property int $model_id
 * @property int $type_id
 * @property string $barcode
 * @property string $stock_code
 * @property string $nomenclature
 * @property string|null $original_description
 * @property string|null $detailed_description
 * @property string|null $translated_description
 * @property int $in_stock
 * @property float $dealer_price
 * @property float $retail_price
 * @property string $manufacture
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $original_code
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Entities\Make $make
 * @property-read \App\Entities\MakeModel $model
 * @property-read \App\Entities\Type|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereDealerPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereDetailedDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereInStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereMakeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereManufacture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereNomenclature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereOriginalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereOriginalDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereRetailPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereStockCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereTranslatedDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product withoutTrashed()
 */
class Product extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
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
        'manufacture',
        'original_code',
        'deleted_at'
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
