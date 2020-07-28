<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @package App\Entities
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $country
 * @property string $city
 * @property string|null $comment
 * @property int $need_callback
 * @property int $delivery_type_id
 * @property int $payment_type_id
 * @property int $status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $status_name
 * @property-read string $total_price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order whereDeliveryTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order whereNeedCallback($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order wherePaymentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Order whereUpdatedAt($value)
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
