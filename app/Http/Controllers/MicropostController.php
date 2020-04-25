<?php

namespace App\Http\Controllers;

use App\Http\Requests\MicropostFormRequest;
use App\Micropost;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MicropostController extends Controller
{

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(MicropostFormRequest $request)
  {
    $micropost = new  Micropost;
    $micropost->content = $request->content;
    $micropost->user_id = $request->user_id;
    if ($request->picture) {
      $imagefile = $request->file('picture');
      $name = $imagefile->getClientOriginalName();
      $micropost->picture = $name;
      Image::make($imagefile)->resize(400, 400)->save(public_path('/images/' . $name));
    }
    $micropost->save();
    session()->flash('success', 'Micropost created!');
    return redirect()->route('root');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Micropost  $micropost
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $micropost = Micropost::find($id);
    if (is_null($micropost)) {
      return redirect()->route('root');
    }
    $micropost->delete();
    session()->flash('success', 'Micropost deleted');
    return back();
  }
}
