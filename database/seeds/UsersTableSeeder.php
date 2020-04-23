<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(\App\User::class)->create([
      "name" => "Example User",
      "email" => "example@railstutorial.org",
      "password" => Hash::make('password'),
      "admin" => true
    ]);
    factory(\App\User::class, 99)->create();
  }
}
