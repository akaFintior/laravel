<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SecondTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        $response->assertCookieNotExpired('XSRF-TOKEN');
        $response->assertCookieMissing('missingCookie');
        $response->assertDontSee('Error');
        $response->assertStatus(200);
    }
}
