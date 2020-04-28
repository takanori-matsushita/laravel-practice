<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
  public function home()
  {
    // \Auth::user() ? $feed_items = \Auth::user()->microposts()->where('user_id', \Auth::id())->paginate(30) : $feed_items = [];
    \Auth::user() ? $feed_items = \Auth::user()->feed()->paginate(30) : $feed_items = [];
    $user = \Auth::user();
    return view('static_pages.home', ['user' => $user, 'feed_items' => $feed_items]);
  }

  public function help()
  {
    return view('static_pages.help');
  }

  public function about()
  {
    return view('static_pages.about');
  }

  public function contact()
  {
    return view('static_pages.contact');
  }
}
