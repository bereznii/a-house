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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFilteredProducts()
    {
        $make = request('makes');
        $model = request('models', '');
        $type = request('types', '');

        $products = Product::where('make_id', $make)
            ->where('model_id', 'like', "%{$model}%")
            ->where('type_id', 'like', "%{$type}%")
            ->paginate(9);

        $products->appends(['makes' => $make]);
        $products->appends(['models' => $model]);
        $products->appends(['types' => $type]);

        session()->flashInput(request()->input());

        $makes = Make::all();

        return view('client.catalog.index')->with([
            'makes' => $makes,
            'products' => $products
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSearchedProducts()
    {
        $query = request('query');

        $products = Product::where('barcode', 'like', "%{$query}%")
            ->orWhere('stock_code', 'like', "%{$query}%")
            ->paginate(9);
        $products->appends(['query' => $query]);

        session()->flashInput(request()->input());

        $makes = Make::all();

        return view('client.catalog.index')->with([
            'makes' => $makes,
            'products' => $products
        ]);
    }
}
