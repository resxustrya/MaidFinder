<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Application extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('application', function($table){
			$table->increments('applicationid');
			$table->integer('appid')->nullable();
			$table->integer('position')->nullable();
			$table->integer('salaryid')->nullable();
			$table->integer('jobtypeid')->nullable();
			$table->integer('capacity')->nullable();
			$table->integer('dayof')->nullable();
			$table->integer('yearexp')->nullable();
			$table->integer('edlevel')->nullable();
			$table->integer('regionid')->nullable();
			$table->string('pitch', 200)->nullable();
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
		Schema::drop('application');
	}

}
