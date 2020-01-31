<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Make;
use App\Models\Product;
use App\Repositories\ClientRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var ClientRepository
     */
    private ClientRepository $clientRepository;

    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepository;

    /**
     * ProductController constructor.
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository, ProductRepository $productRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $product = $this->productRepository->getProduct($id);

        return view('client.item.index')->with([
            'sidebarData' => $this->clientRepository->sidebarData(),
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

        return view('client.catalog.index')->with([
            'sidebarData' => $this->clientRepository->sidebarData(),
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
            'sidebarData' => $this->clientRepository->sidebarData(),
            'products' => $products
        ]);
    }
}
