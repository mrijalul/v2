<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;

class CreateUsersSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$user = [
			[
				'name'				=> 'Bagian Pemeriksa',
				'email'				=> 'bagpemeriksa@i-mobilv2.site',
				'is_bagpemeriksa'	=> '1',
				'email_verified_at' => now(),
				'password'			=> bcrypt('123456'),
				'remember_token' 	=> Str::random(15),
			],
			[
				'name'				=> 'Front Office',
				'email'				=> 'fo@i-mobilv2.site',
				'is_frontoffice'	=> '1',
				'email_verified_at' => now(),
				'password'			=> bcrypt('123456'),
				'remember_token' 	=> Str::random(15),
			],
			[
				'name'				=> 'Pemohon',
				'email'				=> 'pemohon@i-mobilv2.site',
				'is_pemohon'		=> '1',
				'email_verified_at' => now(),
				'password'			=> bcrypt('123456'),
				'remember_token' 	=> Str::random(15),
			],
		];

		foreach ($user as $key => $value) {
			User::create($value);
		}
	}
}
