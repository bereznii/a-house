<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        $productId = request('productId');

        $existingQuantity = (session("cart.{$productId}", 0));
        session(["cart.{$productId}" => $existingQuantity+1]);

        return response()->json(['status' => true]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateQuantity()
    {
        $productQuantity = request('productQuantity');
        $productId = request('productId');

        session(["cart.{$productId}" => $productQuantity]);

        return response()->json(['status' => true]);
    }
}
