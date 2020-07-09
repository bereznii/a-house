<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MakeModel
 *
 * @package App\Entities
 * @mixin \Eloquent
 * @property int $id
 * @property int $make_id
 * @property string $name
 * @property-read \App\Entities\ModelsNameOptions $modelNameOption
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\MakeModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\MakeModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\MakeModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\MakeModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\MakeModel whereMakeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\MakeModel whereName($value)
 */
class MakeModel extends Model
{
    protected $table = 'models';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'make_id'
    ];

    /**
     * Get the model name options record associated with the model.
     */
    public function modelNameOption()
    {
        return $this->belongsTo('App\Entities\ModelsNameOptions', 'id', 'model_id');
    }
}
