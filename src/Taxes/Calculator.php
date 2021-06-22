<?php

namespace App\Taxes;

class Calculator
{
    public function calcul(int $loan, int $term, float $rate): int
    {
        $years = ($loan / $term);
        $month = ($years / 12);
        return $month + ($rate * 100);
    }
}
