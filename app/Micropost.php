<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Micropost extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'content', 'user_id', 'picture'
  ];

  /**
   * @return void
   */
  protected static function booted()
  {
    static::addGlobalScope('order', function (Builder $builder) {
      $builder->orderBy('created_at', 'desc');
    });
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
