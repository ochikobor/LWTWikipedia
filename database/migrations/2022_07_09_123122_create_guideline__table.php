<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidelineTable extends Migration
{
  /**

   * Run the migrations.

   *

   * @return void

   */

  public function up()

  {

    Schema::create('guidelines', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('user_id');
      $table->string('title',15);
      $table->text('content');
      $table->timestamps();

      // 外部キー制約
      $table->foreign('user_id')->references('id')->on('users');
    });
  }



  /**
   * Reverse the migrations.
   *
   * @return void
   */

  public function down()
  {
    Schema::dropIfExists('guidelines');
  }
}