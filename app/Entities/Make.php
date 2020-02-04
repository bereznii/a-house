<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Make
 * @package App\Entities
 * @mixin \Eloquent
 */
class Make extends Model
{
    protected $table = 'makes';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
