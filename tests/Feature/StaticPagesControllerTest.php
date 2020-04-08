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
    $response = $this->get('/static_pages/home');
    $response->assertSuccessful();
    // $browser->assertTitle('Home | Ruby on Rails Tutorial Sample App');

    $response = $this->get('/static_pages/help');
    $response->assertSuccessful();
    // $browser->assertTitle('Help | Ruby on Rails Tutorial Sample App');

    $response = $this->get('/static_pages/about');
    $response->assertSuccessful();
    // $browser->assertTitle('About | Ruby on Rails Tutorial Sample App');
  }
}
