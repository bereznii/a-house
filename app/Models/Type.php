<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 *
 * @package App\Models
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
