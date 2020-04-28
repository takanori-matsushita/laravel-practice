<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Observers\UserObserver;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * @return void
   */
  public static function booted()
  {
    User::observe(UserObserver::class);
  }

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token', 'admin',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function microposts()
  {
    return $this->hasMany('App\Micropost');
  }

  public function feed()
  {
    $following_ids = Relationship::where('follower_id', 1)->get('followed_id');
    return Micropost::whereIn('user_id', $following_ids)->orWhere('user_id', \Auth::id());
  }

  public function active_relationships()
  {
    return $this->hasMany('App\Relationship', 'follower_id');
  }

  public function passive_relationships()
  {
    return $this->hasMany('App\Relationship', 'followed_id');
  }

  public function followers()
  {
    return $this->belongsToMany(self::class, 'relationships', 'followed_id', 'follower_id')->withTimestamps();
  }

  public function following()
  {
    return $this->belongsToMany(self::class, 'relationships', 'follower_id', 'followed_id')->withTimestamps();
  }

  public function follow($other_user)
  {
    return $this->following()->attach($other_user);
  }

  public function unfollow($other_user)
  {
    return $this->following()->detach([$other_user]);
  }

  public function is_following($other_user)
  {
    return (bool) $this->following()->where('followed_id', $other_user)->first(['id']);
  }
}
