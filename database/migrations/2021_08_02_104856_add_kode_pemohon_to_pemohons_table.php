<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKodePemohonToPemohonsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pemohons', function (Blueprint $table) {
			$table->string('kode_pemohon')->after('id')->nullable();
			$table->integer('registered_id')->after('kode_pemohon')->nullable();
			$table->string('registered_name')->after('registered_id')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pemohons', function (Blueprint $table) {
			$table->dropColumn('kode_pemohon');
			$table->dropColumn('registered_id');
			$table->dropColumn('registered_name');
		});
	}
}
