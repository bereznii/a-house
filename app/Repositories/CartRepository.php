<?php

namespace App\Repositories;

use App\Models\Product;

class CartRepository
{
    /**
     * Return ids of products in cart.
     *
     * @return array
     */
    public function getContent(): array
    {
        $ids = session('cart');

        $content['products'] = Product::findMany($ids);

        $totalPrice = $content['products']->sum('retail_price');

        $content['totalPrice'] = number_format((float)$totalPrice, 2, '.', '');

        return $content;

    }
}
