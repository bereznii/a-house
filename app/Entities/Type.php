<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 *
Entities * @mixin \Eloquent
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
