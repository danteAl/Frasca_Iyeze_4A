<?php

class HomeController extends BaseController {

	public function showAccueil() {

		$categories = Categories::all();
		$blagues = DB::table('jokes')->orderBy(DB::raw('RAND()'))->paginate(6);
		
		return View::make('accueil', array('categories' => $categories, 'blagues' => $blagues, 'actif' => 0));
		
	}
	
	public function showTop() {
	
		$categories = Categories::all();
		$blagues = DB::table('jokes')->orderBy('green', 'desc')->take(10)->get();
		
		return View::make('accueil', array('categories' => $categories, 'blagues' => $blagues, 'actif' => -2));
	
	}
	
	public function showCategories($id) {
	
		$categories = Categories::all();
		$categorie = Categories::find($id);
		
		if($categorie) {
			$blagues = $blagues = DB::table('jokes')
			->where('id_category', '=', $id)
			->paginate(6);
			
			return View::make('accueil', array('categories' => $categories, 'blagues' => $blagues, 'actif' => $id));
		}
		else
			App::abort(404);
		
	}
	
	public function showJoke($cat_id, $blag_id) {
		
		$categories = Categories::all();
		
		$blague = DB::table('jokes')
		->select('jokes.id', 'title', 'green', 'id_author', 'jokes.created_at', 'pseudo', 'story')
		->join('users', 'jokes.id_author', '=', 'users.id')
		->where('jokes.id', '=', $blag_id)
		->get();
		
		if($blague)
			return View::make('blague', array('categories' => $categories, 'blague' => $blague, 'actif' => $cat_id));
		
		else App::abort(404);
		
	}
	
	
	
	public function myJokes() {
	
		$categories = Categories::all();
		
		$blagues = DB::table('jokes')
		->where('id_author', '=', Auth::user()->id)
		->paginate(6);
				
		return View::make('accueil', array('categories' => $categories, 'blagues' => $blagues, 'actif' => -4));
	
	}
	
	public function newJoke() {
	
		$categories = Categories::all();
	
		return View::make('api/add', array('categories' => $categories, 'actif' => -3));
	
	}
	
	public function addNewJoke()
	{
		$valide = Jokes::validate(Input::all());
		
		if ($valide->passes()) {
			Jokes::create(array(
				'title' => Input::get('title'),
				'green' => 0,
				'story' => Input::get('story'),
				'id_author' => Auth::user()->id,
				'id_category' => Input::get('catego')
			));
			
			return Redirect::route('accueil')->with('flash_notice', 'Votre blague a ete ajoute');
		}

		return Redirect::to('api/newJoke')->withErrors($valide)->withInput();
	}
	
	public function likeJoke($blag_id) {
	
		$joke = Jokes::find($blag_id);
	
		if($joke) {
			$joke->green += 1;
			$joke->save();
			return Redirect::back();
		}
	
		else App::abort(404);
	
	}
	
	public function deleteJoke($blag_id) {
		
		$joke = Jokes::find($blag_id);
		
		if($joke) {
			$joke->delete();
			return Redirect::to('myJokes')->with('flash_notice', 'Votre blague a ete supprime');
		}

		else App::abort(404);
		
	}
	
	public function modifJoke($blag_id) {
	
		$categories = Categories::all();
		$joke = Jokes::find($blag_id);
	
		return View::make('api/update', array('categories' => $categories, 'joke' => $joke, 'actif' => -3));
	
	}
	
	public function updateJoke() {
		
		$valide = Jokes::validate(Input::all());
		
		if ($valide->passes()) {
			$joke = Jokes::find(Input::get('blag_id'));
			
			$joke->title = Input::get('title');
			$joke->green = 0;
			$joke->story = Input::get('story');
			$joke->id_category = Input::get('catego');
			
			$joke->save();
			
			return Redirect::to('myJokes')->with('flash_notice', 'Votre blague a ete modifie');
		}
		
		return Redirect::to('api/updateJoke/{blag_id}')->withErrors($valide)->withInput();
	}

}
