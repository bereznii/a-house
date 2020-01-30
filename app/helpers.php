<?php

if (! function_exists('mb_ucfirst')) {

    /**
     * Multibyte version of ucfirst.
     *
     * @param string $string
     * @param string $encoding
     * @return string string
     */
    function mb_ucfirst(string $string, string $encoding = 'UTF-8'):string
    {
        $strlen = mb_strlen($string, $encoding);

        $firstChar = mb_substr($string, 0, 1, $encoding);

        $then = mb_substr($string, 1, $strlen - 1, $encoding);

        return mb_strtoupper($firstChar, $encoding) . $then;
    }
}
