<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemohonsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pemohons', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('user_id')->nullable();
			$table->string('nik')->nullable();
			$table->string('nama_lengkap')->nullable();
			$table->string('pekerjaan')->nullable();
			$table->string('jenis_kelamin',1)->nullable();
			$table->string('tempat_lahir')->nullable();
			$table->string('tanggal_lahir')->nullable();
			$table->string('rt')->nullable();
			$table->string('rw')->nullable();
			$table->text('alamat')->nullable();
			$table->text('npwp')->nullable();
			$table->text('no_telp')->nullable();
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
		Schema::dropIfExists('pemohons');
	}
}
