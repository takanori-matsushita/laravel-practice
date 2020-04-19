<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function testSouldGetNew()
  {
    $response = $this->get(route('login'));
    $response->assertViewIs('auth.login');
    $response->assertSuccessful();
  }
}
