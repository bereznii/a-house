<?php

namespace App\Repositories;

use App\Models\ManufacturerCharge;
use App\Models\Shortcut;
use App\Models\Type;

class ImportRepository
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
            self::$types = Type::select('code', 'id')->get()->pluck('id', 'code')->toArray();
        }

        preg_match(self::TYPE_REGEX, $row, $matches);

        $type = array_shift($matches);

        $index = strtoupper(trim($type));

        if (array_pop($matches) == 'VW') {
            list($index) = explode(' ', $type);
        }

        if (!isset($index) || empty($index)) {
            if (strpos($row, 'RW-BO GU') !== false) {
                $index = 'RW-BO GU';
            }
        }
        logger($index);
        return self::$types[$index];
    }

    /**
     * Return detailed description for product. Translated from nomenclature column.
     *
     * @param string $row
     * @return string
     */
    public static function getDetailedDescription(string $row):string
    {
        $description = self::getOriginalDescription($row);

        if (!isset($description)) {
            return null;
        }

        $matches = explode('+', $description);
        unset($matches[0]);

        $result = '';

        foreach ($matches as $match) {
            $result .= self::$shortcuts[trim($match)] . ', ';
        }

        $result = rtrim($result, ' ,') . '.';

        $result = self::mb_ucfirst($result);

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
            self::$shortcuts = Shortcut::select('shortcut', 'meaning')->get()->pluck('meaning', 'shortcut')->toArray();
        }

        preg_match(self::DESCRIPTION_REGEX, $row, $matches);

        $result = array_shift($matches);

        return $result;
    }

    /**
     * Multibyte version of ucfirst.
     *
     * @param string $string
     * @param string $encoding
     * @return string string
     */
    public static function mb_ucfirst(string $string, string $encoding = 'UTF-8'):string
    {
        $strlen = mb_strlen($string, $encoding);

        $firstChar = mb_substr($string, 0, 1, $encoding);

        $then = mb_substr($string, 1, $strlen - 1, $encoding);

        return mb_strtoupper($firstChar, $encoding) . $then;
    }

    /**
     * Return retail price recalculated with charge per manufacturer.
     *
     * @param double $price
     * @return double $price
     */
    public static function calculateRetailPriceWithCharge($price)
    {
        return $price;
    }

    /**
     * @param string $manufacturerName
     * @return string
     */
    public static function getManufacturerIdByName(string $manufacturerName):string
    {
        if (empty(self::$manufacturers)) {
            self::$manufacturers = ManufacturerCharge::select('name', 'id')->get()->pluck('id', 'name')->toArray();
        }

        return self::$manufacturer[$manufacturerName];
    }
}