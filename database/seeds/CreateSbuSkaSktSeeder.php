<?php

use Illuminate\Database\Seeder;
use App\Models\DataSbu;
use App\Models\DataSkaSkt;

class CreateSbuSkaSktSeeder extends Seeder
{
	public function run()
	{
		$dataSBU = [
			['jenis_sbu'=>'Bangunan Gedung'],
			['jenis_sbu'=>'Bangunan Sipil'],
			['jenis_sbu'=>'Instalasi Mekanikal dan Elektrikal'],
		];
		$dataSkaSkt = [
			['jenis_ska_skt' => 'Ahli Teknik Tenaga Listrik - Madya'],
			['jenis_ska_skt' => 'Instalasi Mekanikal dan Elektrikal'],
			['jenis_ska_skt' => 'Pelaksana Bangunan Gedung'],
			['jenis_ska_skt' => 'Pelaksana Pekerjaan Jalan'],
			['jenis_ska_skt' => 'Pelaksana Pekerjaan Jembatan - Kelas III'],
			['jenis_ska_skt' => 'Pelaksana Saluran Irigasi']
		];

		foreach ($dataSBU as $key => $valuesbu) {
			DataSbu::create($valuesbu);
		}
		foreach ($dataSkaSkt as $key => $valueskaskt) {
			DataSkaSkt::create($valueskaskt);
		}
	}
}
