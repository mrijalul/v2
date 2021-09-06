<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIjinLingkungansTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ijin_lingkungan', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('kode_pendaftaran')->nullable();
			$table->string('tanggal_daftar')->nullable();
			$table->integer('status_id')->nullable();
			$table->integer('pemohon_id')->nullable();
			$table->bigInteger('kecamatan_id')->nullable();
			$table->bigInteger('desa_id')->nullable();
			$table->string('rt')->nullable();
			$table->string('rw')->nullable();
			$table->string('jenis_usaha')->nullable();
			$table->string('nama_perusahaan')->nullable();
			$table->string('alamat_perusahaan')->nullable();
			$table->string('nama_penanggungjawab')->nullable();
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
		Schema::dropIfExists('ijin_lingkungan');
	}
}
