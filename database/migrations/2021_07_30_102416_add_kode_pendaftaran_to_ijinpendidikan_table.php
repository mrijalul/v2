<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKodePendaftaranToIjinpendidikanTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ijin_pendidikan', function (Blueprint $table) {
			$table->string('kode_pendaftaran')->after('id')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ijin_pendidikan', function (Blueprint $table) {
			$table->dropColumn('kode_pendaftaran');
		});
	}
}
