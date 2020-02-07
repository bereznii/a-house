<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

class SitemapController extends Controller
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepository;

    /**
     * SitemapController constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->getProductForSitemap();

        return response()->view('client.sitemap.index', [
            'products' => $products,
        ])->header('Content-Type', 'text/xml');
    }
}
