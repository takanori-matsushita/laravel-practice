<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicropostsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('microposts', function (Blueprint $table) {
      $table->id();
      $table->string('content');
      $table->integer('user_id');
      $table->timestamps();
      $table->index(['user_id', 'created_at']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('microposts');
  }
}
