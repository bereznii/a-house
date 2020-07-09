<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\ModelsNameOptions
 *
 * @property int $id
 * @property int $model_id
 * @property string|null $model_name
 * @property string|null $model_years
 * @property string|null $model_body
 * @property string|null $cyrillic_name
 * @property int $is_user_edit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Entities\MakeModel $model
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ModelsNameOptions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ModelsNameOptions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ModelsNameOptions query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ModelsNameOptions whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ModelsNameOptions whereCyrillicName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ModelsNameOptions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ModelsNameOptions whereIsUserEdit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ModelsNameOptions whereModelBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ModelsNameOptions whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ModelsNameOptions whereModelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ModelsNameOptions whereModelYears($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ModelsNameOptions whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
