<?php

namespace Tests\Unit\Slots;

use App\Http\Services\ParseJsonFileService;
use Tests\TestCase;

class ParseJsonFileServiceTest extends TestCase
{
    public function testInvoke()
    {
        $logoutService = resolve(ParseJsonFileService::class);
        $response = $logoutService();
        $this->assertTrue(is_array($response));
    }
}
