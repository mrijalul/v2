<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisizinsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jenisizins', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('nama_jenisijin')->nullable();
			$table->timestamps();
		});
		\DB::statement('ALTER TABLE jenisizins AUTO_INCREMENT = 2222;');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('jenisizins');
	}
}
