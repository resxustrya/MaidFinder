<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Plan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plan', function($table){
			$table->increments('planid');
			$table->string('plan_type',50)->nullable();
			$table->integer('month_expyr')->nullable();
			$table->string('type',10)->nullable();
			$table->string('description',500)->nullable();
			$table->decimal('price',5,2)->nullable();
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
		Schema::drop('plan');
	}

}
