<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employer', function($table){
			$table->increments('empid');
			$table->string('email',200);
			$table->string('password',200);
			$table->string('fname',200);
			$table->string('lname',200);
			$table->string('province',200)->nullable();
			$table->string('address',200)->nullable();
			$table->string('bdate',20)->nullable()->default(date('Y').'-0-1');
			$table->string('gender',10)->nullable();
			$table->string('nationality',20)->nullable();
			$table->string('religion',20)->nullable();
			$table->string('civilstatus')->nullable();
			$table->string('nbi')->nullable();
			$table->string('profilepic')->nullable();
			$table->string('backgroundpic')->nullable();
			$table->string('contactno',200)->nullable();
			$table->boolean('isVerified')->nullable();
			$table->boolean('ishiring')->nullable();
			$table->boolean('subscribe')->nullable()->default(0);
			$table->string('pitch')->nullable();
			$table->integer('regionid')->nullable()->default(1);
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
		Schema::drop('employer');
	}
}
