<?php

use Illuminate\Database\Seeder;
use App\Models\DataStatus;

class CreateDataStatusSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$status = [
			['nama_status'=>'Cetak Permohonan'],
			['nama_status'=>'Diterima Front Office'],
			['nama_status'=>'Input Data SK'],
			['nama_status'=>'Siap DS'],
			['nama_status'=>'Sudah DS'],
			['nama_status'=>'Ditolak Kadin PTSP'],
			['nama_status'=>'Ditolak Pemeriksa'],
			['nama_status'=>'Disetujui Pemeriksa (tanpa Dinas Lain)'],
			['nama_status'=>'Diperiksa Bag. Pemeriksa'],
			['nama_status'=>'Rekomendasi Disetujui'],
			['nama_status'=>'Rekomendasi Ditolak'],
			['nama_status'=>'Diteruskan ke Dinas']
		];

		foreach ($status as $key => $value) {
			DataStatus::create($value);
		}
	}
}
