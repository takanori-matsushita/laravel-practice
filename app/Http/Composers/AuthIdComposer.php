<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class AuthIdComposer
{
  public function compose(View $view)
  {
    $view->with('auth_id', \Auth::id());
  }
}
