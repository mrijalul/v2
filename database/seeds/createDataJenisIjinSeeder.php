<?php

use Illuminate\Database\Seeder;
use App\Models\Jenisizin;

class createDataJenisIjinSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$jenis_ijin = [
			['nama_jenisijin'=>'Izin Penyelenggara Pendidikan Non Formal'],
			['nama_jenisijin'=>'Pemenuhan Komitmen Izin Pendirian Program'],
		];

		foreach ($jenis_ijin as $key => $jenisijin) {
			Jenisizin::create($jenisijin);
		}
	}
}
