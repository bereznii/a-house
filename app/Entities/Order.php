<?php

namespace App\Entities;

use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Entities
 * @mixin \Eloquent
 */
class Order extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    const STATUS_TEXTS = [
        1 => 'Новый',
        2 => 'Выполнен',
        3 => 'Подтверждён',
        4 => 'Отменён'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('App\Entities\Product')
            ->using('App\Entities\OrderProduct')
            ->withPivot('price', 'quantity')
            ->withTimestamps();
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getStatusNameAttribute()
    {
        return self::STATUS_TEXTS[$this->status_id];
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getTotalPriceAttribute()
    {
        return $this->products()->sum('price');
    }
}
