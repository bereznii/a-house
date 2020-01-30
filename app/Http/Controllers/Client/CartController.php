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
        $validatedData = request()->validate([
            'productId' => 'required|numeric'
        ]);

        $productId = $validatedData['productId'];

        $existingQuantity = (session("cart.{$productId}", 0));
        session(["cart.{$productId}" => $existingQuantity+1]);

        return response()->json(['status' => true]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateQuantity()
    {
        $validatedData = request()->validate([
            'productId' => 'required|numeric',
            'productQuantity' => 'required|numeric'
        ]);

        $productQuantity = $validatedData['productQuantity'];
        $productId = $validatedData['productId'];

        session(["cart.{$productId}" => $productQuantity]);

        return response()->json(['status' => true]);
    }
}
