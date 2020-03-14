<?php

namespace App\Services;

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
                $metaTitle = 'Купить автостекло | Подобрать автостекло | Контакты Autoglass House';
                break;
            case 'about':
                $metaTitle = 'Купить автостекло | Подобрать автостекло | Замена автостекла | Autoglass House';
                break;
            case 'product':
                $metaTitle = "{$obj->type->translation} на {$obj->model->name} купить | Autoglass House";
                break;
            case 'catalog':
                if (isset($obj['models']['selectedId']) && isset($obj['models']['list'])) {
                    $autoglassFor = $obj['models']['list']->where('id', $obj['models']['selectedId'])->first()->name;
                } elseif (isset($obj['makes']['selectedId']) && isset($obj['makes']['list'])) {
                    $autoglassFor = $obj['makes']['list']->where('id', $obj['makes']['selectedId'])->first()->name;
                } else {
                    $autoglassFor = 'любой автомобиля';
                }

                $metaTitle = "Автостекло на {$autoglassFor} купить | Autoglass House";
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
                $metaTitle = "Интернет-магазин 'Autoglass House' осуществляет продажу и установку автомобильных стёкол мировых брендов для любого автомобиля. Возможна доставка автостекла по вашему адресу";
                break;
            case 'about':
                $metaTitle = "Интернет-магазин 'Autoglass House' осуществляет продажу и установку автомобильных стёкол мировых брендов для любого автомобиля. Возможна доставка автостекла по вашему адресу";
                break;
            case 'product':
                $metaTitle = "{$obj->type->translation} на {$obj->model->name} дёшево. {$obj->translated_description}. {$obj->detailed_description}. Доставим, либо установим в кратчайшие сроки.";
                break;
            case 'catalog':
                if (isset($obj['models']['selectedId']) && isset($obj['models']['list'])) {
                    $autoglassFor = $obj['models']['list']->where('id', $obj['models']['selectedId'])->first()->name;
                } elseif (isset($obj['makes']['selectedId']) && isset($obj['makes']['list'])) {
                    $autoglassFor = $obj['makes']['list']->where('id', $obj['makes']['selectedId'])->first()->name;
                } else {
                    $autoglassFor = 'любого автомобиля';
                }

                $metaTitle = "Автостекло на {$autoglassFor} купить по лучшей цене. Доставим, либо установим в кратчайшие сроки. Поможем подобрать подходящее автостекло. Autoglass House";
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
                $metaTitle = 'Контакты Autoglass House, Autoglass House почта, подобрать автостекло, ' .
                    'купить автостекло, дёшево, быстро, автостекло Киев, автостекло Украина, автостекло, замена автостекла';
                break;
            case 'about':
                $metaTitle = 'Интернет магазин автостекла, подобрать автостекло, установка автостекла, ' .
                    'купить автостекло, дёшево, быстро, автостекло Киев, автостекло Украина, автостекло, замена автостекла';
                break;
            case 'product':
                $metaTitle = "{$obj->type->translation}, {$obj->model->name}, {$obj->make->name}, {$obj->type->code}." .
                    " купить автостекло, Autoglass House, доставка автостека, установка автостекла";
                break;
            case 'catalog':
                if (isset($obj['models']['selectedId']) && isset($obj['models']['list'])) {
                    $autoglassFor = $obj['models']['list']->where('id', $obj['models']['selectedId'])->first()->name;
                } elseif (isset($obj['makes']['selectedId']) && isset($obj['makes']['list'])) {
                    $autoglassFor = $obj['makes']['list']->where('id', $obj['makes']['selectedId'])->first()->name;
                } else {
                    $autoglassFor = 'любого автомобиля';
                }

                $metaTitle = "Автостекло на {$autoglassFor} купить, Autoglass House, доставка " .
                    "автостекло, установка автостекла, подобрать автостекло, лучшая цена, дёшево, быстро, автостекло Киев," .
                    " автостекло Украина, автостекло";
                break;
        }

        return $metaTitle;
    }
}
