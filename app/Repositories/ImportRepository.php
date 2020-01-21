<?php

namespace App\Repositories;

use App\Models\Shortcut;
use App\Models\Type;

class ImportRepository
{
    private static array $types = [];

    private static array $shortcuts = [];

    const TYPE_REGEX = '/^[A-Z]{2,}\s([A-Z]{2}\b)?/u';

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

        return self::$types[trim($type)];
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
     * @return string
     */
    public static function getOriginalDescription(string $row):string
    {
        if (empty(self::$shortcuts)) {
            self::$shortcuts = Shortcut::select('shortcut', 'meaning')->get()->pluck('meaning', 'shortcut')->toArray();
        }

        preg_match(self::DESCRIPTION_REGEX, $row, $matches);

        return array_shift($matches);
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
}