<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Make
 *
 * @package App\Entities
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Make newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Make newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Make query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Make whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Make whereName($value)
 */
class Make extends Model
{
    protected $table = 'makes';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
