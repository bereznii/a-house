<?php

namespace App\Repositories;

use App\Entities\Order as Model;
use App\Entities\Product;

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

        foreach ($products as &$product) {
            $product['price'] = ceil(Product::find($product['product_id'])->retail_price) * $product['quantity'];
        }

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
