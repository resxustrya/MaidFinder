<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Duty extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('duty', function($table) {
			$table->increments('dutyid');
			$table->integer('adid')->nullable();
			$table->string('cooking')->nullable();
			$table->string('laundry')->nullable();
			$table->string('gardening')->nullable();
			$table->string('grocery')->nullable();
			$table->string('cleaning')->nullable();
			$table->string('tuturing')->nullable();
			$table->string('other')->nullable();
			$table->string('driving')->nullable();
			$table->string('pet')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('duty');
	}

}
