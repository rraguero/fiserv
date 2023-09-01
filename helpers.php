<?php
class Helpers
{
    public static function amountFormat($amount)
    {
        if (strpos($amount, ',') !== false || strpos($amount, '.') !== false) {
            $amountFormat = str_replace(['.', ','], '', $amount);
            return $amountFormat;
        } else {
            return $amount . '00';
        }
    }
}
