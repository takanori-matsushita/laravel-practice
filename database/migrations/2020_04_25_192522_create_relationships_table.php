<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('relationships', function (Blueprint $table) {
      $table->unsignedInteger('follower_id');
      $table->unsignedInteger('followed_id');
      $table->timestamps();
      $table->index('follower_id');
      $table->index('followed_id');
      $table->index(['follower_id', 'followed_id']);
      $table->unique(['follower_id', 'followed_id']);

      $table->foreign('follower_id')->references('id')->on('users');
      $table->foreign('followed_id')->references('id')->on('users');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('relationships');
  }
}
