<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    protected $table = 'makes';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
