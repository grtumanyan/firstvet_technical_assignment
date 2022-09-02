<?php

namespace App\Http\Services;

class SortFileService
{
    public function __invoke($array): array
    {
        usort($array, function ($item1, $item2) {
            return $item1['scheduleId'] <=> $item2['scheduleId'];
        });
        return $array;
    }
}
