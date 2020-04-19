<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UsersLoginTest extends DuskTestCase
{
  use DatabaseMigrations;

  /**
   * A Dusk test example.
   *
   * @return void
   */
  public function testLoginWithInvalidInformation()
  {
    $this->browse(function (Browser $browser) {
      $browser->visit('/login')
        ->assertSeeLink('Sign up now!')
        ->type('email', '')
        ->type('password', '')
        ->press('Log in!')
        ->assertSeeLink('Sign up now!')
        ->assertSee('The form contains 2 errors')
        ->visit('/')
        ->assertDontSee('The form contains 2 errors');
    });
  }

  public function testLoginWithValidInformation()
  {
    $user = $this->registerUser();
    $this->browse(function (Browser $browser) use ($user) {
      $browser->visit('/login')
        ->assertSeeLink('Sign up now!')
        ->type('email', $user->email)
        ->type('password', 'password')
        ->press('Log in!')
        ->assertDontSeeLink('Login')
        ->click('@Users')
        ->assertSeeIn('@Logout', 'Logout')
        ->assertSeeLink('Profile');
    });
  }

  public function testFollowedByLogout()
  {
    $this->browse(function (Browser $browser) {
      $browser->press('Logout')
        ->assertPathIs('/')
        ->assertSeeLink('Login')
        ->assertDontSee('Logout')
        ->assertDontSeeLink('Profile');
    });
  }
}
