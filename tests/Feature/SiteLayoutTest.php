<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SiteLayoutTest extends TestCase
{
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function testRootViewIs()
  {
    $response = $this->get(route('root'));
    $response->assertViewIs('static_pages.home');
  }

  public function testSignupViewIs()
  {
    $response = $this->get(route('users.signup'));
    $response->assertViewIs('users.new');
  }
}
