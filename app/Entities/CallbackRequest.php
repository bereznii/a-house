<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class CallbackRequest extends Model
{
    public $fillable = [
        'is_called'
    ];
}
