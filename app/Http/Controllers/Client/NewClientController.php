<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Services\ClientService;
use App\Services\MetaDataService;

class NewClientController extends Controller
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('client.v2.pages.landing', [
            'currentUrl' => url()->current()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contacts()
    {
        return view('client.v2.pages.contacts', [
            'breadcrumbs' => [
                'title' => 'Контакты'
            ],
            'currentUrl' => url()->current()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return view('client.v2.pages.about', [
            'breadcrumbs' => [
                'title' => 'О нас'
            ],
            'currentUrl' => url()->current()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cart()
    {
        return view('client.v2.pages.cart', [
            'breadcrumbs' => [
                'title' => 'Корзина'
            ],
            'currentUrl' => url()->current(),
            'content' => null
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delivery()
    {
        return view('client.v2.pages.delivery', [
            'breadcrumbs' => [
                'title' => 'Доставка и оплата'
            ],
            'currentUrl' => url()->current()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function catalog()
    {
        return view('client.v2.pages.catalog', [
            'breadcrumbs' => [
                'title' => 'Каталог'
            ],
            'sidebarData' => (new ClientService())->sidebarData(),
            'currentUrl' => url()->current()
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

        return view('client.v2.pages.catalog')->with([
            'sidebarData' => $sideBar,
            'metaData' => $this->metaDataService->collectMetaData('catalog', $sideBar),
            'products' => $products,
            'breadcrumbs' => [
                'title' => 'Каталог'
            ],
            'currentUrl' => url()->current()
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

        return view('client.v2.pages.catalog')->with([
            'sidebarData' => $this->clientService->sidebarData(),
            'metaData' => $this->metaDataService->collectMetaData('catalog'),
            'products' => $products,
            'breadcrumbs' => [
                'title' => 'Каталог'
            ],
            'currentUrl' => url()->current()
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $product = $this->productRepository->getProduct($id);

        return view('client.v2.pages.catalog-item')->with([
            'sidebarData' => $this->clientService->sidebarData(),
            'metaData' => $this->metaDataService->collectMetaData('product', $product),
            'product' => $product,
            'shortModelName' => $product->model->modelNameOption->model_name ?? '',
            'cyrillicModelName' => $product->model->modelNameOption->cyrillic_name ?? '',
            'breadcrumbs' => [
                'title' => $product->model->name
            ],
            'currentUrl' => url()->current()
        ]);
    }
}

