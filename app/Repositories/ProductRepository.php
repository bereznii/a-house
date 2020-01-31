<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    /**
     * @param int $id
     * @return mixed
     */
    public function getProduct(int $id)
    {
        $product = Product::find($id);

        return $product;
    }

    /**
     * @param array $validatedData
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getFilteredProducts(array $validatedData)
    {
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

        return $products;
    }

    /**
     * @param array $validatedData
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getSearchedProducts(array $validatedData)
    {
        $query = $validatedData['query'];

        $products = Product::where('barcode', 'like', "%{$query}%")
            ->where('in_stock', '>', 0)
            ->paginate(9);
        $products->appends(['query' => $query]);

        return $products;
    }
}
