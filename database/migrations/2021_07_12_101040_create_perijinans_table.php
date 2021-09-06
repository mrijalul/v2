<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerijinansTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perijinans', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('nama_perijinan')->nullable();
			$table->string('singkatan_perijinan')->nullable();
			$table->string('slug_perijinan')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('perijinans');
	}
}
