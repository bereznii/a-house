<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Shortcut
 *
 * @property int $id
 * @property string $shortcut
 * @property string $meaning
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Shortcut newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Shortcut newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Shortcut query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Shortcut whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Shortcut whereMeaning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Shortcut whereShortcut($value)
 * @mixin \Eloquent
 */
class Shortcut extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'shortcut',
        'meaning'
    ];
}
