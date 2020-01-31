<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Repositories\CartRepository;
use App\Repositories\ClientRepository;
use App\Repositories\OrderRepository;

class CheckoutController extends Controller
{
    private $cartRepository;
    private $clientRepository;
    private $orderRepository;

    public function __construct(CartRepository $cartRepository, ClientRepository $clientRepository, OrderRepository $orderRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->clientRepository = $clientRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Return client checkout page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkout()
    {
        $content = $this->cartRepository->getContent();

        return view('client.checkout.index')->with([
            'sidebarData' => $this->clientRepository->sidebarData(),
            'content' => $content
        ]);
    }

    /**
     * Return client checkout page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(OrderRequest $request)
    {
        $validated = $request->validated();

        $this->orderRepository->storeOrder($validated);

        session()->flush();
        session()->flashInput(request()->input());

        return view('client.checkout.index')->with([
            'sidebarData' => $this->clientRepository->sidebarData(),
            'thank' => true
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function removeFromCart($id)
    {
        $this->cartRepository->removeFromCartById($id);

        return $this->checkout();
    }
}
