<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('question', 200)->unique();
			$table->string('slug', 200);
			$table->string('first_option', 25);
			$table->string('second_option', 25);
			$table->dateTime('start_at');
			$table->dateTime('end_at');
			$table->boolean('is_active')->default(true);

			$table->softDeletes();
			$table->timestamps();

			$table->index(['slug', 'first_option', 'second_option', 'start_at', 'end_at']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questions');
	}

}
