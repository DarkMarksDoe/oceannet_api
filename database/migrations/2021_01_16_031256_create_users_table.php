<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128)->nullable(false);
            $table->string('lastname', 128)->nullable(false);
            $table->string('genre')->nullable(false);
            $table->date('born_date')->nullable(false);
            $table->string('latitude', 25)->nullable(false);
            $table->string('longitude', 25)->nullable(false);
            $table->string('url_profile_picture', )->nullable(false);
            $table-> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
