<?php

namespace App\Http\Middleware;

class Utils
{
    public function sqlEscape($arg)
    {
        $escaped = preg_replace(
            '/%/',
            '\%',
            $arg
        );

        $escaped = preg_replace(
            '/_/',
            '\_',
            $escaped
        );

        return $escaped;
    }

    public function preparationToAndSearch($arg)
    {
        $spaceConversion = mb_convert_kana($arg, 's');

        return preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
    }
}
