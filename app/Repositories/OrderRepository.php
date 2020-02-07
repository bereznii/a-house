<?php

namespace App\Repositories;

use App\Entities\Order as Model;

class OrderRepository extends CoreRepository
{
    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param array $orderData
     * @return bool
     */
    public function storeOrder(array $orderData): bool
    {
        $products = $orderData['products'];
        unset($orderData['products']);
//        dd($orderData);
        $order = $this->instantiate()->create($orderData);
//        $order->name = $orderData['name'];
//        $order->surname = $orderData['surname'];
//        $order->email = $orderData['email'];
//        $order->phone = $orderData['phone'];
//        $order->address = $orderData['address'];
//        $order->country = $orderData['country'];
//        $order->city = $orderData['city'];
//        $order->delivery_type_id = $orderData['delivery_type_id'];
//        $order->payment_type_id = $orderData['payment_type_id'];
//        $order->need_callback = $orderData['need_callback'];
//        $order->comment = $orderData['comment'];
//        $order->save();
        $order->products()->attach($products);

        return true;
    }

    /**
     * @param int $statusId
     * @return string
     */
    public static function getOrdersStatus(int $statusId): string
    {
        return Model::STATUS_TEXTS[$statusId];
    }
}
