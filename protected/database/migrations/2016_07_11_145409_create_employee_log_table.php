<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeeLogTable extends Migration {

	public function up()
	{
		Schema::create('employee_log', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('employee_id');
			$table->enum('type', array('setor', 'bon'));
			$table->float('amount');
			$table->float('correction');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('employee_log');
	}
}