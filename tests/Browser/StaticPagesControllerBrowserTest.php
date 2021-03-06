<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class StaticPagesControllerBrowserTest extends DuskTestCase
{
  /**
   * A Dusk test example.
   *
   * @return void
   */
  public function setUp(): void
  {
    parent::setUp();
    $this->base_title = 'Ruby on Rails Tutorial Sample App';
  }

  public function testRoot()
  {
    $this->browse(function (Browser $browser) {
      $browser->visit(route('root'))
        ->assertTitle($this->base_title);
    });
  }

  public function testhelp()
  {
    $this->browse(function (Browser $browser) {
      $browser->visit(route('help'))
        ->assertTitle('Help | ' . $this->base_title);
    });
  }

  public function testAbout()
  {
    $this->browse(function (Browser $browser) {
      $browser->visit(route('about'))
        ->assertTitle('About | ' . $this->base_title);
    });
  }

  public function testContact()
  {
    $this->browse(function (Browser $browser) {
      $browser->visit(route('contact'))
        ->assertTitle('Contact | ' . $this->base_title);
    });
  }
}
