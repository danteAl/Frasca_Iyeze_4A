<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('JokesAppSeeder');
		$this->call('CategoriesAppSeeder');
		$this->call('UserAppSeeder');
	}

}
