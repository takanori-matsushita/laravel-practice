<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UsersSignupTest extends DuskTestCase
{
  use DatabaseMigrations;
  /**
   * A Dusk test example.
   *
   * @return void
   */
  public function testInvalidSignupInformation()
  {
    $this->browse(function (Browser $browser) {
      $browser->visit(route('users.signup'))
        ->type('name', '')
        ->type('email', 'user@invalid')
        ->type('password', 'foo')
        ->type('password_confirmation', 'bar')
        ->press('Create my account')
        ->assertPathIs('/signup')
        ->assertSee('The form contains 3 errors')
        ->assertSee('The name field is required')
        ->assertSee('The password must be at least 8 characters.')
        ->assertSee('The password confirmation does not match.');
    });
  }

  public function testValidSignupInformation()
  {
    $this->browse(function (Browser $browser) {
      $browser->visit(route('users.signup'))
        ->type('name', 'Example User')
        ->type('email', 'user@example.com')
        ->type('password', 'password')
        ->type('password_confirmation', 'password')
        ->press('Create my account')
        ->assertPathIs('/users/1')
        ->assertSee('Welcome to the Sample App!')
        ->assertSee('Example User')
        ->visit('/users/1')
        ->assertDontSee('Welcome to the Sample App!');
    });
  }
}
