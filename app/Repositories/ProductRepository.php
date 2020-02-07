<?php

namespace App\Repositories;

use App\Entities\Product as Model;

class ProductRepository
{
    /**
     * @return mixed|string
     */
    protected function instantiate()
    {
        return Model::class;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getProduct(int $id)
    {
        $product = $this->instantiate()->find($id);

        return $product;
    }

    /**
     * @param array $validatedData
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getFilteredProducts(array $validatedData)
    {
        $make = $validatedData['makes'] ?? null;
        $model = $validatedData['models'] ?? null;
        $type = $validatedData['types'] ?? null;

        $products = $this->instantiate()->where('make_id', $make);

        if (isset($model)) {
            $products = $products->where('model_id', $model);
        }

        if (isset($type)) {
            $products = $products->where('type_id', $type);
        }

        $products = $products->where('in_stock', '>', 0)
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

        $products = $this->instantiate()->where('stock_code', 'like', "{$query}%")
            ->where('in_stock', '>', 0)
            ->paginate(9);
        $products->appends(['query' => $query]);

        return $products;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getProductForSitemap()
    {
        $products = $this->instantiate()->select(['id', 'updated_at'])->get();

        return $products;
    }
}
