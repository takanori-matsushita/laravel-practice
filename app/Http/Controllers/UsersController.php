<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\AdminUser;

class UsersController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', [
      'only' => ['index', 'edit', 'update', 'destroy']
    ]);

    $this->middleware(AdminUser::class, [
      'only' => ['destroy']
    ]);
  }

  public function index()
  {
    $users = User::paginate(30);
    return view('users.index', compact('users'));
  }

  public function show(User $user)
  {
    $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($user->email)));
    return view('users.show', ['user' => $user, 'grav_url' => $grav_url]);
  }

  public function edit(User $user)
  {
    $auth = auth()->user();
    return ($user->can('update', $auth)) ? view('users.edit', compact('user')) : redirect()->route('root');
  }

  public function update(UserFormRequest $request, User $user)
  {
    $auth = auth()->user();
    if ($user->can('update', $auth)) {
      $user->name = $request->name;
      $user->email = $request->email;
      if (!empty($request->password)) {
        $user->password = Hash::make($request->password);
      }
      $user->save();
      session()->flash('success', 'Profile updated');
      return redirect()->route('users.show', \Auth::id());
    }
    return redirect()->route('/');
  }

  public function destroy(Request $request, User $user)
  {
    $user = $request->user;
    $user->delete();
    session()->flash('success', 'User deleted');
    return redirect()->route('users.index');
  }
}
