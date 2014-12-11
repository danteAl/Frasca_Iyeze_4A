<?php

class JokesAppSeeder extends Seeder {

	public function run() {

		// clear our database ------------------------------------------
		DB::table('jokes')->delete();

		Jokes::create(array(
			'title' => '1 cheval',
			'story' => "C'est une blonde qui fait de l'equitation et la elle tombe des etriers, elle dit au cheval \"WOW WOW WOW CHEVAL WOW WOW\"...
Et la le gars du supermarcher est venu debrancher le cheval.. !",
			'id_author' => 1,
			'id_category' => 4,
			'green' => 3
		));

		Jokes::create(array(
			'title' => "A quoi sert un preservatif",
			'story' => "A quoi sert un preservatif pour une blonde ? A garder les restes pour plus tard.",
			'id_author' => 2,
			'id_category' => 4,
			'green' => 8
		));

		Jokes::create(array(
					'title' => "Accouchement blonde",
					'story' => "C'est une blonde qui a accouche de 2 beaux bebes, des jumeaux, cependant, elle pleure a n'en plus finir !
L'infirmiere lui dit alors :
- Mais voyons madame ! Pourquoi pleurez-vous ? Vous etes maintenant mere de 2 beaux bebes, en bonne sante !
- Je sais, repond la blonde, mais je ne sais pas qui est le pere du deuxieme !",
					'id_author' => 1,
					'id_category' => 4,
					'green' => 5
				));
		
				Jokes::create(array(
					'title' => 'Blonde et plafond',
					'story' => "Qu'est-ce qui est tout noir, tout crepu et qui est accroche au plafond ?
- Une blonde electricienne !",
					'id_author' => 2,
					'id_category' => 4,
					'green' => 8
				));
		
		
		//Devinettes-----------------------------------------------------------------------------------------
		
		Jokes::create(array(
					'title' => '123 dents et 2 yeux',
					'story' => 'Qu\'est-ce qui a 123 dents et 2 yeux ? Un crocodile.',
					'id_author' => 1,
					'id_category' => 5,
					'green' => 4
				));
		
				Jokes::create(array(
					'title' => '123 dents et 2 yeux suite',
					'story' => "Qu'est-ce qui a 123 yeux et 2 dents ? Un autobus de personnes agees.",
					'id_author' => 2,
					'id_category' => 5,
					'green' => 6
				));
		
		Jokes::create(array(
					'title' => 'Abeilles',
					'story' => "Savez-vous comment les abeilles communiquent entre elles ?
Par E-miel.",
					'id_author' => 1,
					'id_category' => 5,
					'green' => 3
				));
		
		Jokes::create(array(
					'title' => 'Acteur recompense',
					'story' => "Quelle difference y-a-t'il entre un acteur recompense aux Oscars et un aspirine ?
Aucune, ce sont tous deux des cons primes.",
					'id_author' => 2,
					'id_category' => 5,
					'green' => 4
				));
		
		Jokes::create(array(
					'title' => 'Aimer, aimer beaucoup et hair',
					'story' => "Quelle est la difference entre aimer, aimer beaucoup et hair?
Recracher, avaler et mordre",
					'id_author' => 2,
					'id_category' => 5,
					'green' => 1
				));
		
		//Humour noir-------------------------------------------------------------------------------------------
		
		Jokes::create(array(
					'title' => 'Balanacoire',
					'story' => "Pourquoi la petite fille tombe-t-elle de la balancoire?
Parce qu'elle n'a pas de bras...",
					'id_author' => 1,
					'id_category' => 10,
					'green' => 7
				));
		
				Jokes::create(array(
					'title' => 'Ben laden',
					'story' => "Ben Laden telephone a Bush:
- J'ai deux nouvelles pour toi une bonne et une mauvaise..
- Commence par la belle...
- J'ai decide de voyager vers les USA !
- Et la mauvaise ?
- Par avion !",
					'id_author' => 2,
					'id_category' => 10,
					'green' => 9
				));
		
		Jokes::create(array(
					'title' => 'Blagues Toto ',
					'story' => "Toto arrete de tourner ...
TOTO arrete de tourner ...
TOTO ARRETE DE TOURRRNNNNER ...
...
Toto arrete de tourner ou je te cloue l'autre pied !",
					'id_author' => 1,
					'id_category' => 10,
					'green' => 2
				));
		
		Jokes::create(array(
					'title' => 'Blonde',
					'story' => "C'est l'histoire d'une blonde qui a voulu jouer a la roulette russe avec un \"beretta 9mm\".
Elle est morte du premier coup.",
					'id_author' => 1,
					'id_category' => 10,
					'green' => 6
				));
		
		Jokes::create(array(
					'title' => 'Chocolats',
					'story' => "- maman, maman, je peux avoir les chocolats qui sont dans l'armoire?
- mais bien sur ma cherie, tu n'as qu'a les prendre.
- mais maman, je n'ai pas de bras.
- pas de bras, pas de chocolat.",
					'id_author' => 1,
					'id_category' => 10,
					'green' => 5
				));
		
		}

}
