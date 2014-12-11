<?php

class CategoriesAppSeeder extends Seeder {
	
	public function run() {

		// clear our database ------------------------------------------
		DB::table('categories')->delete();

		Categories::create(array('category' => 'Animaux'));
		Categories::create(array('category' => 'Argent'));
		Categories::create(array('category' => 'Blagues nulles'));
		Categories::create(array('category' => 'Blonde'));
		Categories::create(array('category' => 'Devinettes'));
		Categories::create(array('category' => 'Enfant'));
		Categories::create(array('category' => 'Femme'));
		Categories::create(array('category' => 'Fonctionnaires'));
		Categories::create(array('category' => 'Homme'));
		Categories::create(array('category' => 'Humour noir'));
		Categories::create(array('category' => 'Informatique'));
		Categories::create(array('category' => 'Metiers'));
		Categories::create(array('category' => 'Profs'));
		Categories::create(array('category' => 'Sexe'));
		Categories::create(array('category' => 'Sport'));
		Categories::create(array('category' => 'Vieux'));
		
	}

}
