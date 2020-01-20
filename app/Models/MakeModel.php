<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MakeModel extends Model
{
    protected $table = 'models';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'make_id'
    ];
}
