<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Test
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Test newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Test newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Test query()
 * @mixin \Eloquent
 */
class Test extends Model
{
    protected $table = 'tests';

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;
}
