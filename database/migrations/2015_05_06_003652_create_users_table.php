<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('id')->unique()->unsigned();
			$table->string('name');
			$table->string('password');
			$table->string('phone')->default('');
			$table->string('sex')->default('');
			$table->string('email')->default('');
			$table->string('pro_class')->default('');
			$table->boolean('is_admin')->default(0);
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
