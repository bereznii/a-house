<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MakeModel
 * @package App\Entities
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

    /**
     * Get the model name options record associated with the model.
     */
    public function modelNameOption()
    {
        return $this->belongsTo('App\Entities\ModelsNameOptions', 'id', 'model_id');
    }
}
