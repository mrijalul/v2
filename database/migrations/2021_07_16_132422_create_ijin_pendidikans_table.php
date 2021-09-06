<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIjinPendidikansTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ijin_pendidikan', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('tanggal_daftar')->nullable();
			$table->integer('status_id')->nullable();
			$table->integer('pemohon_id')->nullable();
			$table->bigInteger('kecamatan_id')->nullable();
			$table->bigInteger('desa_id')->nullable();
			$table->integer('pilih_pemohon')->nullable();
			$table->string('nama_instansi')->nullable();
			$table->integer('jenis_izin')->nullable();
			$table->string('alamat_sekolah')->nullable();
			$table->bigInteger('nss')->nullable();
			$table->bigInteger('npsn')->nullable();
			$table->string('status_sekolah')->nullable();
			$table->string('penanggungjawab')->nullable();
			$table->string('tgl_no_akte')->nullable();
			$table->string('nib')->nullable();
			$table->string('tgl_nib')->nullable();
			$table->string('nama_kbli')->nullable();
			$table->string('kepala_sekolah')->nullable();
			$table->string('nama_yayasan')->nullable();
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
		Schema::dropIfExists('ijin_pendidikans');
	}
}
