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
                $metaTitle = 'Автостекло Киев | Контакты | Продажа | Установка | Замена';
                break;
            case 'about':
                $metaTitle = 'Автомобильное стекло | Автостекло | Продажа | Установка | Гарантия | Качество';
                break;
            case 'product':
                $modelName = $obj->model->modelNameOption->model_name ?? $obj->model->name;
                $modelNameCyrillic = $obj->model->modelNameOption->cyrillic_name ?? $obj->model->name;
                $metaTitle = "{$obj->type->translation} {$modelName} купить ($modelNameCyrillic) | Замена автостекла Киев | Широкий выбор | Автостекло купить Киев";
                break;
            case 'catalog':
                if (isset($obj['models']['selectedId']) && isset($obj['models']['list'])) {
                    $modelObj = $obj['models']['list']->where('id', $obj['models']['selectedId'])->first();

                    if (isset($modelObj) && isset($modelObj->modelNameOption)) {
                        $modelName = $modelObj->modelNameOption->model_name;
                        $modelNameCyrillic = $modelObj->modelNameOption->cyrillic_name;
                        $autoglassFor = "{$modelName} ({$modelNameCyrillic})";
                    } else {
                        $autoglassFor = 'на любой автомобиль';
                    }
                } elseif (isset($obj['makes']['selectedId']) && isset($obj['makes']['list'])) {
                    $autoglassFor = $obj['makes']['list']->where('id', $obj['makes']['selectedId'])->first()->name;
                } else {
                    $autoglassFor = 'на любой автомобиль';
                }

                $metaTitle = "Автостекло {$autoglassFor} купить | Автостекло | Установка | Замена | Купить автомобильное стекло | Качество";
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
                $translatedDesc = !empty(trim($obj->translated_description))
                                    ? $obj->translated_description
                                    : '';

                $detailedDesc = !empty(trim($obj->detailed_description))
                                    ? $obj->detailed_description . '. '
                                    : '';

                $metaTitle = "{$obj->type->translation} {$obj->model->modelNameOption->model_name} ({$obj->model->modelNameOption->cyrillic_name}).{$translatedDesc}{$detailedDesc}Доставим, либо установим в кратчайшие сроки.";
                break;
            case 'catalog':
                if (isset($obj['models']['selectedId']) && isset($obj['models']['list'])) {
                    $modelObj = $obj['models']['list']->where('id', $obj['models']['selectedId'])->first();

                    if(isset($modelObj) && isset($modelObj->modelNameOption)) {
                        $modelName = $modelObj->modelNameOption->model_name;
                        $modelNameCyrillic = $modelObj->modelNameOption->cyrillic_name;
                        $autoglassFor = "{$modelName} ({$modelNameCyrillic})";
                    } else {
                        $autoglassFor = 'на любой автомобиль';
                    }
                } elseif (isset($obj['makes']['selectedId']) && isset($obj['makes']['list'])) {
                    $autoglassFor = $obj['makes']['list']->where('id', $obj['makes']['selectedId'])->first()->name;
                } else {
                    $autoglassFor = 'на любой автомобиль';
                }

                $metaTitle = "Автостекло {$autoglassFor} купить по лучшей цене. Доставим, либо установим в кратчайшие сроки. Поможем подобрать подходящее автостекло. Autoglass House";
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
                $metaTitle = "{$obj->type->translation}, {$obj->model->name}, {$obj->model->modelNameOption->model_name}, {$obj->model->modelNameOption->cyrillic_name}, {$obj->make->name}, {$obj->type->code}," .
                    " купить автостекло, Autoglass House, доставка автостека, установка автостекла";
                break;
            case 'catalog':
                if (isset($obj['models']['selectedId']) && isset($obj['models']['list'])) {
                    $modelObj = $obj['models']['list']->where('id', $obj['models']['selectedId'])->first();

                    if(isset($modelObj) && isset($modelObj->modelNameOption)) {
                        $modelName = $modelObj->modelNameOption->model_name;
                        $modelNameCyrillic = $modelObj->modelNameOption->cyrillic_name;
                        $autoglassFor = "{$modelName} ({$modelNameCyrillic})";
                    } else {
                        $autoglassFor = 'на любой автомобиль';
                    }
                } elseif (isset($obj['makes']['selectedId']) && isset($obj['makes']['list'])) {
                    $autoglassFor = $obj['makes']['list']->where('id', $obj['makes']['selectedId'])->first()->name;
                } else {
                    $autoglassFor = 'на любой автомобиль';
                }

                $metaTitle = "Автостекло {$autoglassFor} купить, Autoglass House, доставка " .
                    "автостекло, установка автостекла, подобрать автостекло, лучшая цена, дёшево, быстро, автостекло Киев," .
                    " автостекло Украина, автостекло";
                break;
        }

        return $metaTitle;
    }
}
