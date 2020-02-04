<?php

namespace App\Exports;

use App\Entities\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CatalogExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select([
            'barcode',
            'stock_code',
            'nomenclature',
            'original_description',
            'translated_description'
        ])->skip(4654)->limit(4654)->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Штрихкод',
            'Складской код',
            'Номенклатура',
            'Описание из номенклатуры',
            'Расшифровка описания из номеклатуры'
        ];
    }
}
