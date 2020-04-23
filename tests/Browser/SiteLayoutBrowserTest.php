<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SiteLayoutBrowserTest extends DuskTestCase
{
  use DatabaseMigrations;
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

  public function testAuthorizeHeaderMenu()
  {
    $user = $this->registerUser();
    $this->browse(function (Browser $browser) use ($user) {
      $browser->visit(route('root'))
        ->assertSeeLink('Home')
        ->assertSeeLink('Help')
        ->assertSeeLink('Login')
        ->assertDontSeeLink('Users')
        ->assertDontSee('Account')
        ->visit(route('login'))
        ->type('email', $user->email)
        ->type('password', 'password')
        ->press('Log in!')
        ->assertDontSeeLink('Login')
        ->assertSeeLink('Users')
        ->assertSee('Account');
    });
  }
}
