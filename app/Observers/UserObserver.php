<?php

namespace App\Observers;

use App\User;

class UserObserver
{
  /**
   * Handle the user "created" event.
   *
   * @param  \App\User  $user
   * @return void
   */
  public function created(User $user)
  {
    //
  }

  /**
   * Handle the user "updated" event.
   *
   * @param  \App\User  $user
   * @return void
   */
  public function updated(User $user)
  {
    //
  }

  /**
   * Handle the user "deleted" event.
   *
   * @param  \App\User  $user
   * @return void
   */
  public function deleted(User $user)
  {
    $user->microposts->each(function ($post) {
      $post->delete();
    });
    $user->active_relationships->each(function ($follower) {
      $follower->delete();
    });
    $user->passive_relationships->each(function ($followed) {
      $followed->delete();
    });
  }

  /**
   * Handle the user "restored" event.
   *
   * @param  \App\User  $user
   * @return void
   */
  public function restored(User $user)
  {
    //
  }

  /**
   * Handle the user "force deleted" event.
   *
   * @param  \App\User  $user
   * @return void
   */
  public function forceDeleted(User $user)
  {
    //
  }
}
