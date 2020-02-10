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

        $order = $this->instantiate()->create($orderData);
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
