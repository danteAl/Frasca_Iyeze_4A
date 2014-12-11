<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJokesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jokes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 160);
			$table->string('story', 10000);
			$table->integer('id_author');
			$table->integer('id_category');
			$table->integer('green');
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
		Schema::drop('jokes');
	}

}
