<?php

use Illuminate\Database\Seeder;
use App\Models\Perijinan;
use Illuminate\Support\Str;

class CreatePerijinanSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$ijin = [
			[
				'nama_perijinan'		=> 'Pendidikan',
				'singkatan_perijinan'	=> 'Izin Pendidikan',
				'slug_perijinan'		=> Str::slug('Izin Pendidikan','-')
			],
			[
				'nama_perijinan'		=> 'Lingkungan',
				'singkatan_perijinan'	=> 'Izin Lingkungan',
				'slug_perijinan'		=> Str::slug('Izin Lingkungan','-')
			],
			[
				'nama_perijinan'		=> 'PUPR',
				'singkatan_perijinan'	=> 'SIUJK',
				'slug_perijinan'		=> Str::slug('SIUJK','-')
			],
		];

		foreach ($ijin as $key => $value) {
			Perijinan::create($value);
		}
	}
}
