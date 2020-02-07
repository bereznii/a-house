<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Repositories\CartRepository;
use App\Repositories\OrderRepository;
use App\Services\ClientService;
use App\Services\MetaDataService;

class CheckoutController extends Controller
{
    /**
     * @var CartRepository
     */
    private CartRepository $cartRepository;

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
     * @param CartRepository $cartRepository
     * @param ClientService $clientService
     * @param OrderRepository $orderRepository
     */
    public function __construct(
        CartRepository $cartRepository,
        ClientService $clientService,
        OrderRepository $orderRepository,
        MetaDataService $metaDataService
    )
    {
        $this->cartRepository = $cartRepository;
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
        $content = $this->cartRepository->getContent();

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
        $this->cartRepository->removeFromCartById($id);

        return $this->checkout();
    }
}
