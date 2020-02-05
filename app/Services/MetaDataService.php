<?php

namespace App\Services;

use App\Entities\Product;
use App\Repositories\ClientRepository;

class MetaDataService
{
    /**
     * @param $page
     * @param null $obj
     * @return mixed
     */
    public function collectMetaData($page, $obj = null)
    {
        $data['title'] = $this->getMetaTitle($page, $obj);

        return $data;
    }

    /**
     * @param $page
     * @param null|Product|array $obj
     */
    public function getMetaTitle($page, $obj = null)
    {
        switch ($page) {
            case 'contact':
                $metaTitle = 'Контактные данные Autoglass House. Поможем подобрать нужно стекло по лучшей цене';
                break;
            case 'about':
                $metaTitle = 'Интернет магазин Autoglass House. Поможем подобрать нужно стекло по лучшей цене';
                break;
            case 'product':
                $metaTitle = "{$obj->type->translation} для {$obj->model->name} купить по лучшей цене. Интернет магазин Autoglass House";
                break;
            case 'catalog':
                $autoglassFor = '';

//                if (isset($obj['types']['selectedId'])) {
//                    $autoglassFor = $obj['types']['list']->where('id', $obj['types']['selectedId'])->first()->translation .
//                        ' для ' . $obj['models']['list']->where('id', $obj['models']['selectedId'])->first()->name;
//                } else

                if ($obj['models']['selectedId']) {
                    $autoglassFor = $obj['models']['list']->where('id', $obj['models']['selectedId'])->first()->name;
                } elseif (isset($obj['makes']['selectedId'])) {
                    $autoglassFor = $obj['makes']['list']->where('id', $obj['makes']['selectedId'])->first()->name;
                } else {
                    $autoglassFor = 'любого автомобиля';
                }

                $metaTitle = "Автостёкла для {$autoglassFor} купить по лучшей цене. Интернет магазин Autoglass House";
                break;
        }

        return $metaTitle;
    }

    // generate meta description
    public function getMetaDescription()
    {

    }

    // generate meta keywords
    public function getMetaKeywords()
    {

    }
}
