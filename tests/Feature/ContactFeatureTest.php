<?php

namespace Tests\Feature;

use Tests\TestCase;
class ContactFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_navigation_to_contacts()
    {
        $response = $this->get('/contacts');

        $response->assertStatus(200);
    }
}
