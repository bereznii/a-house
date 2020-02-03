<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    /**
     * @param array $orderData
     * @return bool
     */
    public function storeOrder(array $orderData): bool
    {
        $order = app(Order::class);
        $order->name = $orderData['firstName'];
        $order->surname = $orderData['lastName'];
        $order->email = $orderData['email'];
        $order->phone = $orderData['phone'];
        $order->address = $orderData['address'];
        $order->country = $orderData['country'];
        $order->city = $orderData['city'];
        $order->delivery_type_id = $orderData['deliveryMethod'];
        $order->payment_type_id = $orderData['paymentMethod'];
        $order->need_callback = $orderData['callback'];
        $order->comment = $orderData['comment'];
        $order->save();
        $order->products()->attach($orderData['products']);

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
