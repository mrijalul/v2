<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIjinSiujksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ijin_siujk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_pendaftaran')->nullable();
            $table->string('tanggal_daftar')->nullable();
            $table->integer('status_id')->nullable();
            $table->integer('pemohon_id')->nullable();
            $table->bigInteger('kecamatan_id')->nullable();
            $table->bigInteger('desa_id')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('npwp_perusahaan')->nullable();
            $table->string('alamat_perusahaan')->nullable();
            $table->string('nama_direktur')->nullable();
            $table->string('alamat_direktur')->nullable();
            $table->string('notelp_direktur')->nullable();
            $table->integer('sbu_id')->nullable();
            $table->string('tgl_sbu')->nullable();
            $table->integer('skt_id')->nullable();
            $table->string('tgl_skt')->nullable();
            $table->integer('ska_id')->nullable();
            $table->string('tgl_ska')->nullable();
            $table->string('tgl_oss')->nullable();
            $table->string('data_nib')->nullable();
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
        Schema::dropIfExists('ijin_siujk');
    }
}
