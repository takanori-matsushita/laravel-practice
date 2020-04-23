<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UsersControllerTest extends DuskTestCase
{
  use DatabaseMigrations;

  /**
   * A Dusk test example.
   * 
   * @return void
   */
  public function testShouldRedirectEditWhenLoggedInAsWrongUser()
  {
    $users = $this->anyUsers();
    $this->browse(function (Browser $browser) use ($users) {
      $browser->visit('login')
        ->type('email', $users[0]->email)
        ->type('password', 'password')
        ->press('Log in!')
        ->visit('/users/2/edit')
        ->assertPathIs('/')
        ->click('@Users')
        ->press('Logout');
    });
  }

  public function testShouldRedirectIndexWhenNotLoggedIn()
  {
    $users = $this->anyUsers();
    $this->browse(function (Browser $browser) use ($users) {
      $browser->visit(route('users.index'))
        ->assertPathIs('/login');
    });
  }
}
