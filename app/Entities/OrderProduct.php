<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Entities\OrderProduct
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $quantity
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\OrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\OrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\OrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\OrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\OrderProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\OrderProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\OrderProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\OrderProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\OrderProduct whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\OrderProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderProduct extends Pivot
{
    protected $table = 'order_product';


}
