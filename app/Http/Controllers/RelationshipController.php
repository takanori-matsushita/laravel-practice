<?php

namespace App\Http\Controllers;

use App\User;
use App\Relationship;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $user = User::find($request->followed_id);
    \Auth::user()->follow($user);
    return back();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request)
  {
    \Auth::user()->unfollow($request->followed_id);
    return back();
  }
}
