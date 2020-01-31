<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\CartRepository;

class CartController extends Controller
{
    /**
     * @var CartRepository
     */
    private CartRepository $cartRepository;

    /**
     * CartController constructor.
     * @param CartRepository $cartRepository
     */
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        $validatedData = request()->validate([
            'productId' => 'required|numeric'
        ]);

        $this->cartRepository->updateContent($validatedData);

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

        $this->cartRepository->updateQuantity($validatedData);

        return response()->json(['status' => true]);
    }
}
