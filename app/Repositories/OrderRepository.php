<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Product;

class OrderRepository
{
    public function storeOrder(array $cartContents): bool
    {
        $order = app(Order::class);
        $order->name = $cartContents['firstName'];
        $order->surname = $cartContents['lastName'];
        $order->email = $cartContents['email'];
        $order->phone = $cartContents['phone'];
        $order->address = $cartContents['address'];
        $order->country = $cartContents['country'];
        $order->city = $cartContents['city'];
        $order->delivery_type_id = $cartContents['deliveryMethod'];
        $order->payment_type_id = $cartContents['paymentMethod'];
        $order->need_callback = $cartContents['callback'];
        $order->save();
        $order->products()->attach($cartContents['products']);

        return true;
    }
}
