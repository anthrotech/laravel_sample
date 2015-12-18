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
			$table->increments('id');

			$table->string('email', 128)->unique();
			$table->string('password', 60);
			$table->string('forget_token', 100);
			$table->string('remember_token', 100);
			$table->boolean('is_active')->default(false);

			$table->softDeletes();
			$table->timestamps();

			$table->index(['email']);
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
