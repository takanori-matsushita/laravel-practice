<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UsersIndexTest extends DuskTestCase
{
  use DatabaseMigrations;
  /**
   * A Dusk test example.
   *
   * @return void
   */
  public function testIndexIncludingPagination()
  {
    $users = $this->anyUsers();
    $this->browse(function (Browser $browser) use ($users) {
      foreach ($users as $user) {
        $browser->visit(route('login'))
          ->type('email', $user->email)
          ->type('password', 'password')
          ->press('Log in!')
          ->visit(route('users.index'))
          ->assertPathIs('/users')
          ->assertPresent('ul.pagination')
          ->assertSeeLink($user->name)
          ->assertSee($user->name)
          ->click('@Users')
          ->press('Logout');
        if ($user->id >= 30) {
          break;
        }
      }
    });
  }

  public function testIndexAsAdminIncludingPaginationAndDeleteLinks()
  {
    $users = $this->twoUsers();
    $admin = $users[0];
    eval(\Psy\sh());
    $this->browse(function (Browser $browser) use ($admin) {
      $browser->visit(route('login'))
        ->type('email', $admin->email)
        ->type('password', 'password')
        ->press('Log in!')
        ->visit(route('users.index'))
        ->assertPathIs('/users')
        // ->assertPresent('ul.pagination')
        ->assertSee('Sterling Archer')
        ->press('delete')
        ->assertDialogOpened('You sure?')
        ->acceptDialog()
        ->assertDontSee('Sterling Archer')
        ->click('@Users')
        ->press('Logout');
    });
  }

  public function testIndexAsNonAdmin()
  {
    $users = $this->twoUsers();
    $nonAdmin = $users[1];
    $this->browse(function (Browser $browser) use ($nonAdmin) {
      $browser->visit(route('login'))
        ->type('email', $nonAdmin->email)
        ->type('password', 'password')
        ->press('Log in!')
        ->visit(route('users.index'))
        ->assertPathIs('/users')
        // ->assertPresent('ul.pagination')
        ->assertSee('Sterling Archer')
        ->assertDontSee('delete')
        ->click('@Users')
        ->press('Logout');
    });
  }
}
