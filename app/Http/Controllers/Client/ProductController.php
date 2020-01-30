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
        $validatedData = request()->validate([
            'makes' => 'required|numeric',
            'models' => 'nullable|numeric',
            'types' => 'nullable|numeric'
        ]);

        $make = $validatedData['makes'];
        $model = $validatedData['models'] ?? '';
        $type = $validatedData['types'] ?? '';

        $products = Product::where('make_id', $make)
            ->where('model_id', 'like', "%{$model}%")
            ->where('type_id', 'like', "%{$type}%")
            ->where('in_stock', '>', 0)
            ->paginate(9);

        $products->appends([
            'makes' => $make,
            'models' => $model,
            'types' => $type
        ]);

        request()->session()->put([
            'selectedMake' => $make,
            'selectedModel' => $model,
            'selectedType' => $type

        ]);

        session()->flashInput(request()->input());

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
        $validatedData = request()->validate([
            'query' => 'required|alpha_num|max:20'
        ]);

        $query = $validatedData['query'];

        $products = Product::where('barcode', 'like', "%{$query}%")
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
