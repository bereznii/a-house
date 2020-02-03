<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    /**
     * @param array $order
     * @return bool
     */
    public function storeOrder(array $order): bool
    {
        dd($order);
        $order = app(Order::class);
        $order->name = $order['firstName'];
        $order->surname = $order['lastName'];
        $order->email = $order['email'];
        $order->phone = $order['phone'];
        $order->address = $order['address'];
        $order->country = $order['country'];
        $order->city = $order['city'];
        $order->delivery_type_id = $order['deliveryMethod'];
        $order->payment_type_id = $order['paymentMethod'];
        $order->need_callback = $order['callback'];
        $order->comment = $order['comment'];
        $order->save();
        $order->products()->attach($order['products']);

        return true;
    }

    /**
     * @param int $statusId
     * @return string
     */
    public static function getOrdersStatus(int $statusId): string
    {
        return Order::STATUS_TEXTS[$statusId];
    }
}
