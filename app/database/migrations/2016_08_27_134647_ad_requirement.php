<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdRequirement extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ad_req', function($table){
			$table->increments('ad_reqid');
			$table->integer('adid');
			$table->string('barangay',20)->nullable();
			$table->string('police',20)->nullable();
			$table->string('nbi',20)->nullable();
			$table->string('nso',20)->nullable();
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
		Schema::drop('ad_req');
	}

}
