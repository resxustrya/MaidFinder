<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Job extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job', function($table) {
			$table->increments('jobid');
			$table->integer('empid')->nullable();
			$table->string('description',200)->nullable();
			$table->integer('regionid')->nullable();
			$table->string('startdate',50)->nullable();
			$table->string('position',50)->nullable();
			$table->string('capacity',50)->nullable();
			$table->double('salary')->nullable();
			$table->string('dayof', 20)->nullable();
			$table->string('gender', 5)->nullable();
			$table->string('jobtype',20)->nullable();
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
		Schema::drop('job');
	}

}
