<?php

namespace App\Services;

use App\Entities\Product;
use App\Entities\Shortcut;
use App\Entities\Type;

class ImportService
{
    private static array $types = [];

    private static array $shortcuts = [];

    private static array $manufacturers = [];

    const TYPE_REGEX = '/^[A-Za-z]{1,}[\s\+]([A-Za-z]{1,2}\b)?/u';

    const DESCRIPTION_REGEX = '/\+.+$/u';

    /**
     * Return id of product type. From nomenclature field.
     *
     * @param string $row
     * @return int
     */
    public static function getProductTypeId(string $row):int
    {
        if (empty(self::$types)) {
            self::$types = Type::select(['code', 'id'])->get()->pluck('id', 'code')->toArray();
        }

        preg_match(self::TYPE_REGEX, $row, $matches);

        $type = array_shift($matches);

        $index = strtoupper(trim($type));

        if (array_pop($matches) == 'VW') {
            list($index) = explode(' ', $type);
        }

        if (empty($index)) {
            if (strpos($row, 'RW-BO GU') !== false) {
                $index = 'RW-BO GU';
            }
        }

        return self::$types[$index];
    }

    /**
     * Return detailed description for product. Translated from nomenclature column.
     *
     * @param string $row
     * @return string|null
     */
    public static function getTranslatedDescription(string $row)
    {
        $description = self::getOriginalDescription($row);

        if (!isset($description)) {
            return null;
        }

        $matches = explode('+', $description);
        unset($matches[0]);

        $result = '';

        foreach ($matches as $match) {
            $trimmed = trim($match);
            if (array_key_exists($trimmed, self::$shortcuts)) {
                $result .= self::$shortcuts[$trimmed] . ', ';
            }
        }

        $result = rtrim($result, ' ,') . '.';


        $result = mb_ucfirst($result);
//        logger('Description: ' . $result);

        return $result;
    }

    /**
     * Return origin description. Part with description from nomenclature column.
     *
     * @param string $row
     * @return string|null
     */
    public static function getOriginalDescription(string $row)
    {
        if (empty(self::$shortcuts)) {
            self::$shortcuts = Shortcut::selectRaw('TRIM(shortcut) as shortcut, TRIM(meaning) as meaning')->get()->pluck('meaning', 'shortcut')->toArray();
        }

        preg_match(self::DESCRIPTION_REGEX, $row, $matches);

        $result = array_pop($matches);

        return $result;
    }

    /**
     * Return retail price recalculated with charge per manufacturer.
     *
     * @param array $row
     * @return double $price
     */
    public static function calculateRetailPriceWithCharge($row)
    {
        if (preg_match('/WS.*/', $row[0])) { //переднее
            if (trim($row[6]) == 'SafeGlass') {
                $percent = 34.88;
            } else {
                $percent = 18;
            }
        } elseif (preg_match('/RW.*/', $row[0])) { //заднее
            if (trim($row[6]) == 'SafeGlass') {
                $percent = 34.87;
            } else {
                $percent = 25.17;
            }
        } else { //боковое
            $percent = 34.47;
        }

        $price = $row[5] + ($row[5] * ($percent / 100));

        return number_format((float)$price, 2, '.', '');
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function generateVendorCodes(): int
    {
        $products = Product::whereNull('vendor_code')->get();

        foreach ($products as $key => $product) {
            $this->insertVendorCode($product);
        }

        return $products->count();
    }

    /**
     * @param Product $product
     * @throws \Exception
     */
    private function insertVendorCode(Product $product): void
    {
        $vendorCode = '';

        if (preg_match('/WS.*/', $product->barcode)) { //переднее
            $vendorCode .= 'V';
        } elseif (preg_match('/RW.*/', $product->barcode)) { //заднее
            $vendorCode .= 'Z';
        } elseif (preg_match('/BO.*/', $product->barcode)) { //боковое
            $vendorCode .= 'B';
        } else { //боковое
            $vendorCode .= 'U';
        }

        $this->insertUniqueCombination($vendorCode, $product);
    }

    /**
     * @param string $vendorCode
     * @param Product $product
     * @throws \Exception
     */
    private function insertUniqueCombination(string $vendorCode, Product $product): void
    {
        $code = $vendorCode . (string) random_int(100000, 999999);

        try {
            Product::where('id', $product->id)->update(['vendor_code' => $code]);
        } catch (\Exception $e) {
            $this->insertUniqueCombination($vendorCode, $product);
        }
    }
}
