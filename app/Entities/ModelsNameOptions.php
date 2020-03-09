<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ModelsNameOptions extends Model
{
    /**
     * @var string
     */
    protected $table = 'models_names_options';

    /**
     * @var array
     */
    public $fillable = [
        'model_id',
        'model_name',
        'model_years',
        'model_body',
        'is_user_edit',
        'cyrillic_name'
    ];

    /**
     * Get the model record associated with the product.
     */
    public function model()
    {
        return $this->belongsTo('App\Entities\MakeModel', 'model_id', 'id');
    }
}
