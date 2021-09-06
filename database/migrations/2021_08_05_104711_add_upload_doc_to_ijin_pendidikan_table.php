<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUploadDocToIjinPendidikanTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ijin_pendidikan', function (Blueprint $table) {
			$table->text('foto_direktur')->after('nama_yayasan')->nullable();
			$table->text('denah_lokasi')->after('foto_direktur')->nullable();
			$table->text('alamat_lokasi')->after('denah_lokasi')->nullable();
			$table->text('akta_sewa')->after('alamat_lokasi')->nullable();
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
			$table->dropColumn('foto_direktur');
			$table->dropColumn('denah_lokasi');
			$table->dropColumn('alamat_lokasi');
			$table->dropColumn('akta_sewa');
		});
	}
}
