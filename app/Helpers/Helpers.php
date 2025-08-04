<?php

if (!function_exists('formatNumberSpacing')) {
    function formatNumberSpacing($number)
    {
        // if user doesnt have a number -> make the field empty
        if (!$number) {
            return '';
        }

        $number = (int) $number;

        // use number_format to add spaces as thousands separators
        return '(+84) ' . number_format($number, 0, ' ', ' ');
    }
}
