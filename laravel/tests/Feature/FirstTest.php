<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FirstTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        $response->assertDontSeeText('Привет');
        $response->assertSeeText('Добро пожаловать');
        $response->assertLocation(route('index'));
        $response->assertStatus(200);
    }
}
