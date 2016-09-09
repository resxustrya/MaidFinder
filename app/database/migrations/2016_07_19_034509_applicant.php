<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Applicant extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applicant', function($table){
			$table->increments('appid');
			$table->string('email',200);
			$table->string('password',200);
			$table->string('fname',200);
			$table->string('lname',200);
			$table->string('province',200)->nullable();
			$table->string('address',200)->nullable();
			$table->string('birth',20)->nullable()->default(date('Y').'-0-1');
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
			$table->string('preferedSched',200)->nullable();
			$table->string('empType',200)->nullable();
			$table->string('expectedSalary',50)->nullable();
			$table->boolean('accountStatus')->nullable();
			$table->boolean('empStatus')->nullable();
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
		Schema::drop('applicant');
	}

}
