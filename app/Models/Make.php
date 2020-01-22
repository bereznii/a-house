<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Make
 * @package App\Models
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
