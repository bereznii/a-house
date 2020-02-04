<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Shortcut extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'shortcut',
        'meaning'
    ];
}
