<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApplyAd extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apply_ad', function($table) {
			$table->increments('id');
			$table->integer('empid')->nullable();
			$table->integer('adid')->nullable();
			$table->integer('appid')->nullable();
			$table->boolean('isSeen')->nullable();
			$table->string('message',500)->nullable();
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
		Schema::drop('apply_ad');
	}
}
