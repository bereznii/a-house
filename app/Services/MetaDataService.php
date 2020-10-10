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
            case 'landing':
                $metaTitle = 'Автостекло Киев | Купить автомобильное стекло | Замена';
                break;
            case 'about':
                $metaTitle = 'Автомобильное стекло | Автостекло | Продажа | Установка';
                break;
            case 'product':
                $modelName = $obj->model->modelNameOption->model_name ?? $obj->model->name ?? '';
                $modelNameCyrillic = $obj->model->modelNameOption->cyrillic_name ?? $obj->model->name ?? 'Киев';
                $translation = $obj->type->translation ?? 'Автостекло';
                $metaTitle = "{$translation} {$modelName} купить ($modelNameCyrillic) | Замена автостекла Киев | Автостекло купить Киев";
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
                    $autoglassFor = $obj['makes']['list']->where('id', $obj['makes']['selectedId'])->first();

                    $autoglassFor = isset($autoglassFor)
                        ? $autoglassFor->name
                        : 'на любой автомобиль';
                } else {
                    $autoglassFor = 'на любой автомобиль';
                }

                $metaTitle = "Автостекло {$autoglassFor} купить | Установка | Замена";
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
            case 'landing':
                $metaTitle = "Autoglass House осуществляет продажу и установку автомобильных стёкол. Свяжитесь с нами по телефону, вайберу или по электронной почте, закажите обратный звонок, и мы Вам перезвоним в течении 15 минут";
                break;
            case 'about':
                $metaTitle = "В 'Autoglass House' возможно купить или заменить автомобильное стекло для любого автомобился. Доставка автостекла по адресу или перевозчиком 'Новая Почта'";
                break;
            case 'product':
                $translatedDesc = $obj->translated_description ?? '';
                $translatedDesc = !empty(trim($translatedDesc))
                                    ? $translatedDesc
                                    : '';

                $detailedDesc = $obj->translated_description ?? '';
                $detailedDesc = !empty(trim($detailedDesc))
                                    ? $detailedDesc . '. '
                                    : '';

                $modelName = $obj->model->modelNameOption->model_name ?? $obj->model->name ?? '';
                $modelNameCyrillic = $obj->model->modelNameOption->cyrillic_name ?? $obj->model->name ?? 'Киев';
                $translation = $obj->type->translation ?? 'Автостекло';

                $metaTitle = "{$translation} {$modelName} ({$modelNameCyrillic}).{$translatedDesc}{$detailedDesc}Доставим, либо установим в кратчайшие сроки.";
                break;
            case 'catalog':
                if (isset($obj['models']['selectedId']) && isset($obj['models']['list'])) {
                    $modelObj = $obj['models']['list']->where('id', $obj['models']['selectedId'])->first();

                    if(isset($modelObj) && isset($modelObj->modelNameOption)) {
                        $modelName = $modelObj->modelNameOption->model_name ?? '';
                        $modelNameCyrillic = $modelObj->modelNameOption->cyrillic_name ?? 'Киев';
                        $autoglassFor = "{$modelName} ({$modelNameCyrillic})";
                    } else {
                        $autoglassFor = 'на любой автомобиль';
                    }
                } elseif (isset($obj['makes']['selectedId']) && isset($obj['makes']['list'])) {
                    $autoglassFor = $obj['makes']['list']->where('id', $obj['makes']['selectedId'])->first()->name;
                } else {
                    $autoglassFor = 'на любой автомобиль';
                }

                $metaTitle = "Автостекло {$autoglassFor} купить по лучшей цене. Поможем подобрать подходящее автостекло. Autoglass House";
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
            case 'landing':
                $metaTitle = 'Интернет магазин автостекла, подобрать автостекло, установка автостекла, ' .
                    'купить автостекло, дёшево, быстро, автостекло Киев, автостекло Украина, автостекло, замена автостекла';
                break;
            case 'about':
                $metaTitle = 'Интернет-магазин автостекла, купить автостекло, подобрать автостекло, установка автостекла, ' .
                    'замена автостекла, автостекло Киев, автостекло Украина, автостекло';
                break;
            case 'product':
                $modelName = $obj->model->modelNameOption->model_name ?? $obj->model->name ?? '';
                $modelNameCyrillic = $obj->model->modelNameOption->cyrillic_name ?? $obj->model->name ?? 'Киев';
                $translation = $obj->type->translation ?? 'Автостекло';
                $makeName = $obj->make->name ?? '';
                $typeCode = $obj->type->code ?? '';
                $modelNameShort = $obj->model->name ?? $modelName;

                $metaTitle = "{$translation}, {$modelNameShort}, {$modelName}, {$modelNameCyrillic}, {$makeName}, {$typeCode}," .
                    " купить автостекло, Autoglass House, доставка автостека, установка автостекла";
                break;
            case 'catalog':
                if (isset($obj['models']['selectedId']) && isset($obj['models']['list'])) {
                    $modelObj = $obj['models']['list']->where('id', $obj['models']['selectedId'])->first();

                    if(isset($modelObj) && isset($modelObj->modelNameOption)) {
                        $modelName = $modelObj->modelNameOption->model_name ?? '';
                        $modelNameCyrillic = $modelObj->modelNameOption->cyrillic_name ?? 'Киев';
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
