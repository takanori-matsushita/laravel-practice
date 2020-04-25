<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class CurrentUserComposer
{
  public function compose(View $view)
  {
    $view->with('current_user', \Auth::user());
  }
}
