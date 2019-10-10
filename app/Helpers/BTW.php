<?php


if (!function_exists('exclBtw')) {
    function exclBtw($incl, $percentage) {
        return ($incl / (100 + $percentage)) * 100;
    }
}

if (!function_exists('calcBtwExcl')) {
    function calcBtwExcl($excl, $percentage) {
        return $excl + ($excl / 100 * $percentage);
    }
}

if (!function_exists('Btw')) {
    function Btw($incl) {
        $btw = 21;
        $priceExcludingVat = exclBtw($incl, $btw);
        $vatToPay = ($priceExcludingVat / 100) * $btw;

        return number_format($vatToPay, 2);
    }
}
