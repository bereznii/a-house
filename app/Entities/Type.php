<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 * 
 * Entities * @mixin \Eloquent
 *
 * @property int $id
 * @property string $code
 * @property string $translation
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Type whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Type whereTranslation($value)
 * @mixin \Eloquent
 */
class Type extends Model
{
    protected $table = 'types';

    public $timestamps = false;

    protected $fillable = [
        'code',
        'translation'
    ];
}
