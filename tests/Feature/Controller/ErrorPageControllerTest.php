<?php

namespace Controller;

use Tests\TestCase;

class ErrorPageControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get(route('error'));

        $response->assertStatus(200);

        $response->assertViewIs('error');

        $response->assertSee('Unauthorized', $response);
        $response->assertSee('401 error', $response);
    }
}
