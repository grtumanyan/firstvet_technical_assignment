<?php

namespace App\Http\Services;

class SortResultService
{
    public function __invoke($array): array
    {
        asort($array);
        return array_values($array);
    }
}
