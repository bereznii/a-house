<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\ManufacturerCharge
 *
 * @property int $id
 * @property string $name
 * @property float|null $charge
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ManufacturerCharge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ManufacturerCharge newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ManufacturerCharge query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ManufacturerCharge whereCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ManufacturerCharge whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ManufacturerCharge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ManufacturerCharge whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ManufacturerCharge whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ManufacturerCharge extends Model
{
    protected $table = 'manufacturer_charge';

    protected $fillable = [
        'name'
    ];
}
