<?php

namespace App\Imports;

use App\Models\Shortcut;
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
            0 => new ShortcutsImport(),
            1 => new TypesImport(),
            2 => new CatalogImport(),
        ];
    }
}
