<?php
class UserAppSeeder extends Seeder {
 
    public function run() {
    	
    	// clear our database ------------------------------------------
    	DB::table('users')->delete();
 
        User::create(array(
                    'pseudo' => 'Admin',
                    'password' => Hash::make('admin'),
                    'email' => 'admin@gmail.fr',
                ));
 
        User::create(array(
                    'pseudo' => 'Spartiate',
                    'password' => Hash::make('azerty'),
                    'email' => 'spartiate@gmail.fr',
                ));

	}
	
}