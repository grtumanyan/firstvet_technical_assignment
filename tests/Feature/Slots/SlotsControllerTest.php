<?php

namespace Tests\Feature\Slots;

use Tests\TestCase;

class SlotsControllerTest extends TestCase
{

    /**
     * @group success
     */
    public function testSuccess()
    {
        $response = $this->get(route('slots'));

        $response->assertStatus(200)
            ->assertJsonStructure(['available_slots']);
    }
}
