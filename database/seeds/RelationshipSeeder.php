<?php

use App\User;
use App\Relationship;
use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $users = User::all();
    $user = $users->first();
    $following = range(3, 51);
    $followers = range(4, 41);

    foreach ($followers as $follower) {
      factory(Relationship::class)->create([
        'followed_id' => $user->id,
        'follower_id' => $follower
      ]);
    }

    foreach ($following as $followed) {
      factory(Relationship::class)->create([
        'followed_id' => $followed,
        'follower_id' => $user->id
      ]);
    }
  }
}
