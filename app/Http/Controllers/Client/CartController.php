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

        session(["cart.{$productId}" => $productId]);

        return response()->json(['status' => true]);
    }
}
