<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Services\ClientService;
use App\Services\MetaDataService;

class ProductController extends Controller
{
    /**
     * @var ClientService
     */
    private ClientService $clientService;

    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepository;

    /**
     * @var MetaDataService
     */
    private MetaDataService $metaDataService;

    /**
     * ProductController constructor.
     * @param ClientService $clientService
     */
    public function __construct(ClientService $clientService, ProductRepository $productRepository, MetaDataService $metaDataService)
    {
        $this->clientService = $clientService;
        $this->productRepository = $productRepository;
        $this->metaDataService = $metaDataService;
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $product = $this->productRepository->getProduct($id);

        return view('client.item.index')->with([
            'sidebarData' => $this->clientService->sidebarData(),
            'metaData' => $this->metaDataService->collectMetaData('product', $product),
            'product' => $product
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFilteredProducts()
    {
        $validatedData = request()->validate([
            'makes' => 'required|numeric',
            'models' => 'nullable|numeric',
            'types' => 'nullable|numeric'
        ]);

        $products = $this->productRepository->getFilteredProducts($validatedData);

        session()->flashInput(request()->input());

        $sideBar = $this->clientService->sidebarData();

        return view('client.catalog.index')->with([
            'sidebarData' => $sideBar,
            'metaData' => $this->metaDataService->collectMetaData('catalog', $sideBar),
            'products' => $products
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSearchedProducts()
    {
        $validatedData = request()->validate([
            'query' => 'required|alpha_num|max:20'
        ]);

        $products = $this->productRepository->getSearchedProducts($validatedData);

        session()->flashInput(request()->input());

        return view('client.catalog.index')->with([
            'sidebarData' => $this->clientService->sidebarData(),
            'metaData' => $this->metaDataService->collectMetaData('catalog'),
            'products' => $products
        ]);
    }
}
