<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StaticPagesControllerTest extends TestCase
{
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function testStaticPagesController()
  {
    $response = $this->get('/');
    $response->assertSuccessful();

    $response = $this->get('/help');
    $response->assertSuccessful();

    $response = $this->get('/about');
    $response->assertSuccessful();

    $response = $this->get('/contact');
    $response->assertSuccessful();
  }
}
