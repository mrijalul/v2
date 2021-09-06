<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataStatusesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('data_statuses', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('nama_status')->nullable();
			$table->timestamps();
		});
		\DB::statement('ALTER TABLE data_statuses AUTO_INCREMENT = 1111;');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('data_statuses');
	}
}
