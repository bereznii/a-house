<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Make;
use App\Models\Product;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $product = Product::find($id);

        return view('client.item.index')->with([
            'sidebarData' => ClientRepository::sidebarData(),
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
            ->where('in_stock', '>', 0)
            ->paginate(9);

        $products->appends(['makes' => $make]);
        $products->appends(['models' => $model]);
        $products->appends(['types' => $type]);

        request()->session()->put('selectedMake', $make);
        request()->session()->put('selectedModel', $model);
        request()->session()->put('selectedType', $type);

        session()->flashInput(request()->input());
//        dd(ClientRepository::sidebarData());
        return view('client.catalog.index')->with([
            'sidebarData' => ClientRepository::sidebarData(),
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
//            ->orWhere('stock_code', 'like', "%{$query}%")
            ->where('in_stock', '>', 0)
            ->paginate(9);
        $products->appends(['query' => $query]);

        session()->flashInput(request()->input());

        return view('client.catalog.index')->with([
            'sidebarData' => ClientRepository::sidebarData(),
            'products' => $products
        ]);
    }
}
