<?php

namespace App\Services;

use App\Entities\Make;
use App\Entities\MakeModel;
use App\Entities\Product;
use App\Entities\Type;

class ClientService
{
    /**
     * @return array
     */
    public function sidebarData()
    {
        $makes = null;
        if (!request()->session()->has('makes')) {
            $makes = Make::all();
        }

        $selectedMake = request()->session()->get('selectedMake', null);

        $models = request()->session()->get('models', null);
        $selectedModel = request()->session()->get('selectedModel', null);

        if (empty($selectedModel) && (isset($models) && $models->count() > 0)) {
            $types = self::getTypesByModelId($models->first()->id);
        } elseif (isset($selectedModel)) {
            $types = self::getTypesByModelId($selectedModel);
        } else {
            $types = request()->session()->get('types', null);
        }

        $selectedType = request()->session()->get('selectedType', null);

        $cartCount = array_sum(request()->session()->get('cart', []));

        return [
            'makes' => [
                'list' => $makes,
                'selectedId' => $selectedMake
            ],
            'models' => [
                'list' => $models,
                'selectedId' => $selectedModel
            ],
            'types' => [
                'list' => $types,
                'selectedId' => $selectedType
            ],
            'cartCount' => $cartCount
        ];
    }

    /**
     * Return types for given model id.
     *
     * @param int $modelId
     * @return \Illuminate\Support\Collection
     */
    public function getTypesByModelId($modelId)
    {
        $typesForModel = Product::select('type_id')
            ->where('model_id', $modelId)
            ->where('in_stock', '>', 0)
            ->groupBy('type_id')
            ->get()
            ->pluck('type_id')
            ->toArray();

        $types = Type::whereIn('id' , $typesForModel)->get();

        return $types;
    }

    /**
     * @param int $makeId
     * @return MakeModel|\Illuminate\Database\Eloquent\Collection
     */
    public function getModelsByMakeId(int $makeId)
    {
        $models = MakeModel::where('make_id', $makeId)
            ->get();

        return $models;
    }
}
