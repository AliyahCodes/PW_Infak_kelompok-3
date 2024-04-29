<?php

namespace App\Helpers;

class myHelpers
{
    public static function getMonthName($monthNumber, $year = 2024)
    {
        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $monthName = $months[$monthNumber];

        if ($year) {
            $monthName .= ' ' . $year;
        }

        return $monthName;
    }

    public static function getAllMonths($year = 2024)
    {
        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        if ($year) {
            foreach ($months as $monthNumber => $monthName) {
                $months[$monthNumber] = $monthName . ' ' . $year;
            }
        }

        return $months;
    }
}
