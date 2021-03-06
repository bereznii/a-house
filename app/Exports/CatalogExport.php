<?php

namespace App\Exports;

use App\Entities\Product;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class CatalogExport implements FromArray, WithHeadings, ShouldAutoSize, WithColumnFormatting
{
    /**
     * @var Collection
     */
    private Collection $products;

    /**
     * CatalogExport constructor.
     * @param $products
     */
    public function __construct($products)
    {
        $this->products = $products;
    }

    /**
     * @return array
     */
    public function array(): array
    {
        $result = [];
        foreach ($this->products as $key => $product) {

            $result[$key][] = $product->manufacture;
            $result[$key][] = $product->stock_code;
            $result[$key][] = $product->type->translation . ' ' . $product->model->name;
            $result[$key][] = (float)number_format((float)$product->retail_price, 2, '.', '');
            $result[$key][] = $product->in_stock;
            $result[$key][] = '';
            $result[$key][] = trim($product->original_code, " \t\n\r\0\x0B");
            $result[$key][] = $product->vendor_code;
        }

        return $result;
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_GENERAL,
            'B' => NumberFormat::FORMAT_GENERAL,
            'C' => NumberFormat::FORMAT_GENERAL,
            'D' => NumberFormat::FORMAT_NUMBER_00,
            'E' => NumberFormat::FORMAT_GENERAL,
            'F' => NumberFormat::FORMAT_GENERAL,
            'G' => NumberFormat::FORMAT_TEXT,
            'H' => NumberFormat::FORMAT_GENERAL,
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Производитель',
            'Еврокод',
            'Описание', //Лобовое стекло, {название модели}
            'Цена',
            'Количество',
            'Ссылки фото', //empty
            'Оригинальный код',
            'Артикул',
        ];
    }
}
