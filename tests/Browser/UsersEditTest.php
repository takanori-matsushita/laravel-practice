<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UsersEditTest extends DuskTestCase
{
  use DatabaseMigrations;
  /**
   * A Dusk test example.
   *
   * @return void
   */

  public function testAuthenticateCantAccessEdit()
  {
    $this->browse(function (Browser $browser) {
      $browser->visit('/users/1/edit')
        ->assertPathIs('/login');
    });
  }

  public function testUnsuccessfulEdit()
  {
    $user = $this->registerUser();
    $this->browse(function (Browser $browser) use ($user) {
      $browser->visit('/login')
        ->assertSeeLink('Sign up now!')
        ->type('email', $user->email)
        ->type('password', 'password')
        ->press('Log in!')
        ->click('@Users')
        ->click('@Settings')
        ->type('name', '')
        ->type('email', 'foo@invalid')
        ->type('password', 'foo')
        ->type('password_confirmation', 'bar')
        ->press('Save changes')
        ->assertPathIs('/users/1/edit')
        ->assertSee('The form contains 2 errors');
    });
  }

  public function testSuccessfulEdit()
  {
    $user = $this->registerUser();
    $this->browse(function (Browser $browser) {
      $browser
        ->click('@Users')
        ->click('@Settings')
        ->type('name', 'Foo Bar')
        ->type('email', 'foo@bar.com')
        ->type('password', '')
        ->type('password_confirmation', '')
        ->press('Save changes')
        ->assertPathIs('/users/1')
        ->assertSee('Profile updated')
        ->script('location.reload();');
      $browser
        ->assertDontSee('Profile updated');
    });
  }

  public function testLogout()
  {
    $user = $this->registerUser();
    $this->browse(function (Browser $browser) {
      $browser->click('@Users')
        ->press('Logout')
        ->assertPathIs('/');
    });
  }

  public function testSuccessfulEditWithFriendlyForwarding()
  {
    $user = $this->registerUser();
    $this->browse(function (Browser $browser) use ($user) {
      $browser->visit('/users/1/edit')
        ->assertPathIs('/login')
        ->type('email', $user->email)
        ->type('password', 'password')
        ->press('Log in!')
        ->assertPathIs('/users/1/edit');
    });
  }
}
