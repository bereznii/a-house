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
        $cart = session('cart');

        $ids = array_keys($cart);

        $content['products'] = Product::findMany($ids);
        $content['quantities'] = $cart;
        $content['prices'] = $this->getPrices($content);

        $totalPrice = array_sum($content['prices']);

        $content['totalPrice'] = number_format((float)$totalPrice, 2, '.', '');

        return $content;
    }

    private function getPrices($content)
    {
        $prices = [];
        foreach ($content['products'] as $product) {
            $price = $product->retail_price * $content['quantities'][$product->id];
            $prices[$product->id] = number_format((float)$price, 2, '.', '');
        }

        return $prices;
    }
}
