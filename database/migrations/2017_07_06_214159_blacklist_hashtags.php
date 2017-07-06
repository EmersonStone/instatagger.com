<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlacklistHashtags extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
      Schema::create('blacklist_hashtags', function (Blueprint $table) {
        $table->increments('id');

        $table->integer('user_id')->unsigned()->index();
        $table->string('hashtag')->index();

        $table->timestamps();
      });

      Schema::create('tagged_posts', functioN(Blueprint $table) {
        $table->increments('id');

        $table->string('instagram_id')->index();
        $table->string('hashtag');

        $table->timestamps();
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
      Schema::dropIfExists('blacklist_hashtags');
      Schema::dropIfExists('tagged_posts');
  }
}
