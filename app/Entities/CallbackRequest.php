<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CallbackRequest
 *
 * @package App\Entities
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $comment
 * @property int $is_called
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\CallbackRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\CallbackRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\CallbackRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\CallbackRequest whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\CallbackRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\CallbackRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\CallbackRequest whereIsCalled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\CallbackRequest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\CallbackRequest wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\CallbackRequest whereUpdatedAt($value)
 */
class CallbackRequest extends Model
{
    public $fillable = [
        'is_called'
    ];
}
