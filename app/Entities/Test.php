<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;
}
