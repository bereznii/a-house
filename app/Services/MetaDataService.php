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
                $metaTitle = 'Автоскло Київ | Контакти | Продаж | Встановлення | Заміна';
                break;
            case 'landing':
                $metaTitle = 'Автоскло Київ | Купити автомобільне скло | Заміна';
                break;
            case 'about':
                $metaTitle = 'Автомобільне скло | Автоскло | Продаж | Встановлення';
                break;
            case 'product':
                $modelName = $obj->model->modelNameOption->model_name ?? $obj->model->name ?? '';
                $modelNameCyrillic = $obj->model->modelNameOption->cyrillic_name ?? $obj->model->name ?? 'Київ';
                $translation = $obj->type->translation ?? 'Автосткло';
                $metaTitle = "{$translation} {$modelName} купити ($modelNameCyrillic) | Заміна автоскла Київ | Автоскло купити Київ";
                break;
            case 'catalog':
                if (isset($obj['models']['selectedId']) && isset($obj['models']['list'])) {
                    $modelObj = $obj['models']['list']->where('id', $obj['models']['selectedId'])->first();

                    if (isset($modelObj) && isset($modelObj->modelNameOption)) {
                        $modelName = $modelObj->modelNameOption->model_name;
                        $modelNameCyrillic = $modelObj->modelNameOption->cyrillic_name;
                        $autoglassFor = "{$modelName} ({$modelNameCyrillic})";
                    } else {
                        $autoglassFor = 'на будь-який автомобіль';
                    }
                } elseif (isset($obj['makes']['selectedId']) && isset($obj['makes']['list'])) {
                    $autoglassFor = $obj['makes']['list']->where('id', $obj['makes']['selectedId'])->first();

                    $autoglassFor = isset($autoglassFor)
                        ? $autoglassFor->name
                        : 'на будь-який автомобіль';
                } else {
                    $autoglassFor = 'на будь-який автомобіль';
                }

                $metaTitle = "Автоскло {$autoglassFor} купити | Встановлення | Заміна";
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
                $metaTitle = "Інтернет-магазин 'Autoglass House' здійснює продаж та встановлення автомобільного скла світових брендів для будь-якого автомобіля. Можлива доставка автоскла на вашу адресу";
                break;
            case 'landing':
                $metaTitle = "Autoglass House здійснює продаж та встановлення автомобільного скла. Зв'яжіться з нами по телефону, вайберу або електронною поштою, замовте зворотний дзвінок, і ми Вам передзвонимо протягом 15 хвилин";
                break;
            case 'about':
                $metaTitle = "У 'Autoglass House' можна купити або замінити автомобільне скло для будь-якого автомобіля. Доставка автоскла за адресою або перевізником 'Нова Пошта'";
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
                $modelNameCyrillic = $obj->model->modelNameOption->cyrillic_name ?? $obj->model->name ?? 'Київ';
                $translation = $obj->type->translation ?? 'Автоскло';

                $metaTitle = "{$translation} {$modelName} ({$modelNameCyrillic}).{$translatedDesc}{$detailedDesc}Доставимо або встановимо в найкоротші терміни.";
                break;
            case 'catalog':
                if (isset($obj['models']['selectedId']) && isset($obj['models']['list'])) {
                    $modelObj = $obj['models']['list']->where('id', $obj['models']['selectedId'])->first();

                    if(isset($modelObj) && isset($modelObj->modelNameOption)) {
                        $modelName = $modelObj->modelNameOption->model_name ?? '';
                        $modelNameCyrillic = $modelObj->modelNameOption->cyrillic_name ?? 'Киев';
                        $autoglassFor = "{$modelName} ({$modelNameCyrillic})";
                    } else {
                        $autoglassFor = 'на будь-який автомобіль';
                    }
                } elseif (isset($obj['makes']['selectedId']) && isset($obj['makes']['list'])) {
                    $autoglassFor = $obj['makes']['list']->where('id', $obj['makes']['selectedId'])->first()->name;
                } else {
                    $autoglassFor = 'на будь-який автомобіль';
                }

                $metaTitle = "Автоскло {$autoglassFor} купити за найкращою ціною. Допоможемо підібрати відповідне автоскло. Autoglass House";
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
                $metaTitle = 'Контакти Autoglass House, Autoglass House пошта, підібрати автоскло, ' .
                    'купити автоскло, дешево, швидко, автоскло Київ, автоскло Україна, автоскло, заміна автоскла';
                break;
            case 'landing':
                $metaTitle = 'Інтернет-магазин автоскла, підібрати автоскло, встановлення автоскла, ' .
                    'купити автоскло, дешево, швидко, автоскло Київ, автоскло Україна, автоскло, заміна автоскла';
                break;
            case 'about':
                $metaTitle = 'Інтернет-магазин автоскла, купити автоскло, підібрати автоскло, встановлення автоскла, ' .
                    'заміна автоскла, автоскло Київ, автоскло Україна, автоскло';
                break;
            case 'product':
                $modelName = $obj->model->modelNameOption->model_name ?? $obj->model->name ?? '';
                $modelNameCyrillic = $obj->model->modelNameOption->cyrillic_name ?? $obj->model->name ?? 'Київ';
                $translation = $obj->type->translation ?? 'Автоскло';
                $makeName = $obj->make->name ?? '';
                $typeCode = $obj->type->code ?? '';
                $modelNameShort = $obj->model->name ?? $modelName;

                $metaTitle = "{$translation}, {$modelNameShort}, {$modelName}, {$modelNameCyrillic}, {$makeName}, {$typeCode}," .
                    " купити автоскло, AutoGlass House, доставка автоскло, встановлення автоскла";
                break;
            case 'catalog':
                if (isset($obj['models']['selectedId']) && isset($obj['models']['list'])) {
                    $modelObj = $obj['models']['list']->where('id', $obj['models']['selectedId'])->first();

                    if(isset($modelObj) && isset($modelObj->modelNameOption)) {
                        $modelName = $modelObj->modelNameOption->model_name ?? '';
                        $modelNameCyrillic = $modelObj->modelNameOption->cyrillic_name ?? 'Киев';
                        $autoglassFor = "{$modelName} ({$modelNameCyrillic})";
                    } else {
                        $autoglassFor = 'на будь-який автомобіль';
                    }
                } elseif (isset($obj['makes']['selectedId']) && isset($obj['makes']['list'])) {
                    $autoglassFor = $obj['makes']['list']->where('id', $obj['makes']['selectedId'])->first()->name;
                } else {
                    $autoglassFor = 'на будь-який автомобіль';
                }

                $metaTitle = "Автоскло {$autoglassFor} купити, Autoglass House, доставка " .
                    "автоскло, встановлення автоскла, підібрати автоскло, краща ціна, дешево, швидко, автоскло Київ," .
                    " автоскло Україна, автоскло";
                break;
        }

        return $metaTitle;
    }
}
