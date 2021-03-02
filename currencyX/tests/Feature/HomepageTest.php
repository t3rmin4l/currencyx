<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    /**
     * Test homepage returns 200
     *
     * @return void
     */
    public function test_homepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
