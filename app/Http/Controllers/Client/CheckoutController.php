<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Repositories\OrderRepository;
use App\Services\CartService;
use App\Services\ClientService;
use App\Services\MetaDataService;

class CheckoutController extends Controller
{
    /**
     * @var CartService
     */
    private CartService $cartService;

    /**
     * @var ClientService
     */
    private ClientService $clientService;

    /**
     * @var OrderRepository
     */
    private OrderRepository $orderRepository;


    /**
     * @var MetaDataService
     */
    private MetaDataService $metaDataService;

    /**
     * CheckoutController constructor.
     * @param CartService $cartService
     * @param ClientService $clientService
     * @param OrderRepository $orderRepository
     */
    public function __construct(
        CartService $cartService,
        ClientService $clientService,
        OrderRepository $orderRepository,
        MetaDataService $metaDataService
    )
    {
        $this->cartService = $cartService;
        $this->clientService = $clientService;
        $this->orderRepository = $orderRepository;
        $this->metaDataService = $metaDataService;
    }

    /**
     * Return client checkout page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkout()
    {
        $content = $this->cartService->getContent();

        return view('client.checkout.index')->with([
            'sidebarData' => $this->clientService->sidebarData(),
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
            'sidebarData' => $this->clientService->sidebarData(),
            'metaData' => $this->metaDataService->collectMetaData('catalog'),
            'thank' => true
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function removeFromCart($id)
    {
        $this->cartService->removeFromCartById($id);

        return $this->checkout();
    }
}
