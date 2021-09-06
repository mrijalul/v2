<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(CreateUsersSeeder::class);
		$this->call(CreatePerijinanSeeder::class);
		$this->call(CreateDataStatusSeeder::class);
		$this->call(createDataJenisIjinSeeder::class);
		$this->call(CreateSbuSkaSktSeeder::class);
	}
}
