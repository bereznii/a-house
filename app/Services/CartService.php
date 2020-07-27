<?php

namespace App\Services;

use App\Entities\Product;

class CartService
{
    /**
     * Return ids of products in cart.
     *
     * @return array
     */
    public function getContent(): array
    {
        $cart = session('cart', []);

        $ids = array_keys($cart);

        $content['products'] = Product::findMany($ids);
        $content['quantities'] = $cart;
        $content['prices'] = $this->getPrices($content);

        $totalPrice = array_sum($content['prices']) * 0.95;

        $content['totalPrice'] = number_format((float)$totalPrice, 2, '.', '');

        return $content;
    }

    /**
     * @param array $content
     * @return array
     */
    private function getPrices($content)
    {
        $prices = [];
        foreach ($content['products'] as $product) {
            $price = $product->retail_price * $content['quantities'][$product->id];
            $prices[$product->id] = number_format((float)$price, 2, '.', '');
        }

        return $prices;
    }

    /**
     * @param array $validatedData
     * @return bool
     */
    public function updateContent(array $validatedData): bool
    {
        $productId = $validatedData['productId'];

        $existingQuantity = (session("cart.{$productId}", 0));

        if ($existingQuantity === 0) {
            session(["cart.{$productId}" => $existingQuantity+1]);

            return true;
        }

        return false;
    }

    /**
     * @param array $validatedData
     * @return void
     */
    public function updateQuantity(array $validatedData)
    {
        $productQuantity = $validatedData['productQuantity'];
        $productId = $validatedData['productId'];

        session(["cart.{$productId}" => $productQuantity]);
    }

    /**
     * @param int $id
     * @return void
     */
    public function removeFromCartById(int $id)
    {
        request()->session()->forget("cart.{$id}");
    }
}
