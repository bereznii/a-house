<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = [
        'status_id'
    ];

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
        return $this->belongsToMany('App\Models\Product')
            ->using('App\Models\OrderProduct')
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
