<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shortcut extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'shortcut',
        'meaning'
    ];
}
