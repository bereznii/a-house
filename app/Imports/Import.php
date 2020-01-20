<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class Import implements WithMultipleSheets
{
    use WithConditionalSheets;

    /**
     * @return array
     */
    public function conditionalSheets(): array
    {
        return [
            0 => new CatalogImport(),
            1 => new TypesImport(),
        ];
    }
}
