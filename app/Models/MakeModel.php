<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MakeModel
 * @package App\Models
 * @mixin \Eloquent
 */
class MakeModel extends Model
{
    protected $table = 'models';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'make_id'
    ];
}
