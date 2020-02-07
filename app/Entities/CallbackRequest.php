<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CallbackRequest
 * @package App\Entities
 * @mixin \Eloquent
 */
class CallbackRequest extends Model
{
    public $fillable = [
        'is_called'
    ];
}
