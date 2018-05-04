<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('works', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('working_time');
			$table->longText('content');
			$table->integer('skill_level');
			$table->integer('people');
			$table->string('contact_name');
			$table->string('contact_email')->nullable();
			$table->string('contact_phone')->nullable();
			$table->string('budget')->nullable();
			$table->string('avatar')->nullable();
			$table->boolean('is_over')->default(false);
			$table->dateTime('start_at')->nullable();
			$table->dateTime('end_at')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('work');
	}
}
