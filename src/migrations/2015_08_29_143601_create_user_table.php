<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    	Schema::create('tb_user', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('confirmation_code');
            $table->string('auth_token');
            $table->string('phone')->nullable();
            $table->string('profile_image')->nullable();
		    $table->string('profile_image_alt')->nullable();
		    $table->string('you_tube_video_id')->nullable();
            $table->text('biography');
            $table->bigInteger('count_views');
            $table->enum('status', array('PENDING', 'CONFIRMED'))->default('PENDING');
            $table->enum('role', array('CLIENT', 'CHEF'))->default('CLIENT');
		    $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('tb_user');
	}

}
