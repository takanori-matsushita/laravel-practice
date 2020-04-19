<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
  public function show($id)
  {
    $user = User::find($id);
    $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($user->email)));
    return view('users.show', ['user' => $user, 'grav_url' => $grav_url]);
  }
}
