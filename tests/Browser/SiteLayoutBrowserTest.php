<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SiteLayoutBrowserTest extends DuskTestCase
{
  /**
   * A Dusk test example.
   *
   * @return void
   */
  public function testRootViewLink()
  {
    $this->browse(function (Browser $browser) {
      $browser->visit(route('root'))
        ->assertSeeLink('Sample app')
        ->assertSeeLink('Home')
        ->assertSeeLink('Help')
        ->assertSeeLink('About')
        ->assertSeeLink('Contact');
    });
  }
}
