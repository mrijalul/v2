<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPersyaratanToIjinSiujkTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ijin_siujk', function (Blueprint $table) {
			$table->text('syarat1')->after('data_nib')->nullable();
			$table->text('syarat2')->after('data_nib')->nullable();
			$table->text('syarat3')->after('data_nib')->nullable();
			$table->text('syarat4')->after('data_nib')->nullable();
			$table->text('syarat5')->after('data_nib')->nullable();
			$table->text('syarat6')->after('data_nib')->nullable();
			$table->text('syarat7')->after('data_nib')->nullable();
			$table->text('syarat8')->after('data_nib')->nullable();
			$table->text('syarat9')->after('data_nib')->nullable();
			$table->text('syarat10')->after('data_nib')->nullable();
			$table->text('syarat11')->after('data_nib')->nullable();
			$table->text('syarat12')->after('data_nib')->nullable();
			$table->text('syarat13')->after('data_nib')->nullable();
			$table->text('syarat14')->after('data_nib')->nullable();
			$table->text('syarat15')->after('data_nib')->nullable();
			$table->text('syarat16')->after('data_nib')->nullable();
			$table->text('syarat17')->after('data_nib')->nullable();
			$table->text('syarat18')->after('data_nib')->nullable();
			$table->text('syarat19')->after('data_nib')->nullable();
			$table->text('syarat20')->after('data_nib')->nullable();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ijin_siujk', function (Blueprint $table) {
				$table->dropColumn('syarat1');
				$table->dropColumn('syarat2');
				$table->dropColumn('syarat3');
				$table->dropColumn('syarat4');
				$table->dropColumn('syarat5');
				$table->dropColumn('syarat6');
				$table->dropColumn('syarat7');
				$table->dropColumn('syarat8');
				$table->dropColumn('syarat9');
				$table->dropColumn('syarat10');
				$table->dropColumn('syarat11');
				$table->dropColumn('syarat12');
				$table->dropColumn('syarat13');
				$table->dropColumn('syarat14');
				$table->dropColumn('syarat15');
				$table->dropColumn('syarat16');
				$table->dropColumn('syarat17');
				$table->dropColumn('syarat18');
				$table->dropColumn('syarat19');
				$table->dropColumn('syarat20');
		});
	}
}
