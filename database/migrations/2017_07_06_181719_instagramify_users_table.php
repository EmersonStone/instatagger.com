<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InstagramifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('email');
          $table->dropColumn('password');

          $table->string('username')->unique();
          $table->string('avatar');
          $table->text('token');
          $table->integer('instagram_id')->unique();
        });

        Schema::dropIfExists('password_resets');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('username');
          $table->dropColumn('avatar');
          $table->dropColumn('token');
          $table->dropColumn('instagram_id');

          $table->string('email')->unique();
          $table->string('password');
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }
}
