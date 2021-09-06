<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPersyaratanToIjinLingkunganTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ijin_lingkungan', function (Blueprint $table) {
			$table->text('data_imb')->after('nama_penanggungjawab')->nullable();
			$table->text('s_pengantar_dlh')->after('data_imb')->nullable();
			$table->text('d_pendirian_usaha')->after('s_pengantar_dlh')->nullable();
			$table->text('izin_usaha')->after('d_pendirian_usaha')->nullable();
			$table->text('fc_ktp')->after('izin_usaha')->nullable();
			$table->text('slf')->after('fc_ktp')->nullable();
			$table->text('d_nib')->after('slf')->nullable();
			$table->text('i_lokasi')->after('d_nib')->nullable();
			$table->text('d_ukl')->after('i_lokasi')->nullable();
			$table->text('npwp_pribadi')->after('d_ukl')->nullable();
			$table->text('i_operasional')->after('npwp_pribadi')->nullable();
			$table->text('sk_dpmptsp')->after('i_operasional')->nullable();
			$table->text('dp_usaha')->after('sk_dpmptsp')->nullable();
			$table->text('npwp_bhukum')->after('dp_usaha')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ijin_lingkungan', function (Blueprint $table) {
				$table->dropColumn('data_imb');
				$table->dropColumn('s_pengantar_dlh');
				$table->dropColumn('d_pendirian_usaha');
				$table->dropColumn('izin_usaha');
				$table->dropColumn('fc_ktp');
				$table->dropColumn('slf');
				$table->dropColumn('d_nib');
				$table->dropColumn('i_lokasi');
				$table->dropColumn('d_ukl');
				$table->dropColumn('npwp_pribadi');
				$table->dropColumn('i_operasional');
				$table->dropColumn('sk_dpmptsp');
				$table->dropColumn('dp_usaha');
				$table->dropColumn('npwp_bhukum');
		});
	}
}
