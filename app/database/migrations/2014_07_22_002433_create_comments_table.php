<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('user_id');
			$table->integer('question_id');

			$table->string('title', 200);
			$table->string('slug', 200);
			$table->text('content');
			$table->enum('type', ['text', 'video', 'photo', 'link', 'audio', 'vine']);
			$table->string('selected_option', 25);
			$table->boolean('is_active')->default(true);

			$table->softDeletes();
			$table->timestamps();

			$table->index(['type', 'slug', 'selected_option']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
