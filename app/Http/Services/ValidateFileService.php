<?php

namespace App\Http\Services;

class ValidateFileService
{
    public function __invoke($data): bool
    {
        if (!array_key_exists('startDate', $data)
            || !array_key_exists('startTime', $data)
            || !array_key_exists('endDate', $data)
            || !array_key_exists('endTime', $data)
            || array_key_exists('startBreak5', $data)
        ) {
            return false;
        }
        return true;
    }
}
