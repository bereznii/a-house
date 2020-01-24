<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Make;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $makes = Make::all();
        $product = Product::find($id);

        return view('client.item.index')->with([
            'makes' => $makes,
            'product' => $product
        ]);
    }

    /**
     *
     */
    public function getFilteredProducts()
    {
        $products = Product::where('make_id', request('makes'))
            ->where('model_id', request('models'))
            ->where('type_id', request('types'))
            ->paginate(12);

        $makes = Make::all();

        return view('client.catalog.index')->with([
            'makes' => $makes,
            'products' => $products
        ]);
    }

    /**
     *
     */
    public function getSearchedProducts()
    {
        $query = request('query');

        $products = Product::where('barcode', 'like', "%{$query}%")
            ->orWhere('stock_code', 'like', "%{$query}%")
            ->paginate(12);

        $makes = Make::all();

        return view('client.catalog.index')->with([
            'makes' => $makes,
            'products' => $products
        ]);
    }
}
