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
        $data['description'] = $this->getMetaDescription($page, $obj);
        $data['keywords'] = $this->getMetaKeywords($page, $obj);

        return $data;
    }

    /**
     * @param $page
     * @param null $obj
     * @return string
     */
    public function getMetaTitle($page, $obj = null)
    {
        switch ($page) {
            case 'contact':
                $metaTitle = 'Контактные данные Autoglass House. Поможем подобрать нужно стекло по лучшей цене';
                break;
            case 'about':
                $metaTitle = 'Интернет-магазин Autoglass House. Поможем подобрать нужно стекло по лучшей цене';
                break;
            case 'product':
                $metaTitle = "{$obj->type->translation} для {$obj->model->name} купить по лучшей цене. Интернет магазин Autoglass House";
                break;
            case 'catalog':
//                if (isset($obj['types']['selectedId'])) {
//                    $autoglassFor = $obj['types']['list']->where('id', $obj['types']['selectedId'])->first()->translation .
//                        ' для ' . $obj['models']['list']->where('id', $obj['models']['selectedId'])->first()->name;
//                } else

                if (isset($obj['models']['selectedId'])) {
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

    /**
     * @param $page
     * @param null $obj
     * @return string
     */
    public function getMetaDescription($page, $obj = null)
    {
        switch ($page) {
            case 'contact':
                $metaTitle = "Наш интернет-магазин 'Autoglass House' осуществляет продажу и установку автомобильных стёкол мировых брендов. Мы подберём Вам любое стекло на любой автомобиль. Если вам неудобно приехать к нам, мы доставим стекло по указаному адресу. Всегда готовы помочь Вам в вопросе подбора, доставки и установки нужного стекла!";
                break;
            case 'about':
                $metaTitle = "Наш интернет-магазин 'Autoglass House' осуществляет продажу и установку автомобильных стёкол мировых брендов. Мы подберём Вам любое стекло на любой автомобиль. Если вам неудобно приехать к нам, мы доставим стекло по указаному адресу. Всегда готовы помочь Вам в вопросе подбора, доставки и установки нужного стекла!";
                break;
            case 'product':
                $metaTitle = "{$obj->type->translation} для {$obj->model->name} высокого качества по лучшей цене. Доставим, либо установим в кратчайшие сроки. Поможем подобрать подходящее стекло по лучшей цене. Если вам неудобно приехать к нам, мы доставим стекло по указаному адресу. {$obj->translated_description}. {$obj->detailed_description}";
                break;
            case 'catalog':
                if (isset($obj['models']['selectedId'])) {
                    $autoglassFor = $obj['models']['list']->where('id', $obj['models']['selectedId'])->first()->name;
                } elseif (isset($obj['makes']['selectedId'])) {
                    $autoglassFor = $obj['makes']['list']->where('id', $obj['makes']['selectedId'])->first()->name;
                } else {
                    $autoglassFor = 'любого автомобиля';
                }

                $metaTitle = "Автостёкла для {$autoglassFor} купить высокого качества по лучшей цене. Доставим, либо установим в кратчайшие сроки. Поможем подобрать подходящее стекло по лучшей цене. Если вам неудобно приехать к нам, мы доставим стекло по указаному адресу. Интернет магазин Autoglass House";
                break;
        }

        return $metaTitle;
    }

    /**
     * @param $page
     * @param null $obj
     * @return string
     */
    public function getMetaKeywords($page, $obj = null)
    {
        switch ($page) {
            case 'contact':
                $metaTitle = 'Контактные данные Autoglass House, Autoglass House электронная почта, подобрать стекло, ' .
                    'лучшая цена, дёшево, быстро, автостекло Киев, автостекло Украина, автостекло, Sekurit, Pilkington,' .
                    ' AGC, Splintex, Autover, PGW, SafeGlass';
                break;
            case 'about':
                $metaTitle = 'Интернет-магазин Autoglass House, Autoglass House электронная почта, подобрать стекло, ' .
                    'лучшая цена, дёшево, быстро, автостекло Киев, автостекло Украина, автостекло, Sekurit, Pilkington,' .
                    ' AGC, Splintex, Autover, PGW, SafeGlass';
                break;
            case 'product':
                $metaTitle = "{$obj->type->translation}, {$obj->model->name}, {$obj->make->name}, {$obj->type->code}" .
                    " купить по лучшей цене, Autoglass House, доставка автостека, установка автостекла";
                break;
            case 'catalog':
                if (isset($obj['models']['selectedId'])) {
                    $autoglassFor = $obj['models']['list']->where('id', $obj['models']['selectedId'])->first()->name;
                } elseif (isset($obj['makes']['selectedId'])) {
                    $autoglassFor = $obj['makes']['list']->where('id', $obj['makes']['selectedId'])->first()->name;
                } else {
                    $autoglassFor = 'любого автомобиля';
                }

                $metaTitle = "Автостёкла для {$autoglassFor} купить по лучшей цене, Autoglass House, доставка " .
                    "автостека, установка автостекла, подобрать стекло, лучшая цена, дёшево, быстро, автостекло Киев," .
                    " автостекло Украина, автостекло, Sekurit, Pilkington, AGC, Splintex, Autover, PGW, SafeGlass";
                break;
        }

        return $metaTitle;
    }
}
