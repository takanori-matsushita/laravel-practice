<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
  protected $primaryKey = [
    'follower_id', 'followed_id'
  ];

  public $incrementing = false;

  protected $fillable = [
    'follower_id', 'followed_id'
  ];


  public function follower()
  {
    $this->belongsTo('App\User');
  }

  public function followed()
  {
    $this->belongsTo('App\User');
  }
}
