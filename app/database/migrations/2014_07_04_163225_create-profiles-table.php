<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('profiles', function (Blueprint $table)
		{
			$table->increments('id');

			$table->integer('user_id');

			$table->string('full_name', 70);
			$table->string('address', 100);
			$table->string('city', 64);
			$table->string('state', 64);
			$table->string('zip', 8);
			$table->string('country', 32);

			$table->string('age', 3);
			$table->string('gender', 1);
			$table->string('language', 5);
			$table->string('relationship', 20);

			$table->string('ip_address', 15);

			$table->softDeletes();
			$table->timestamps();

			$table->index(['full_name']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}
}
