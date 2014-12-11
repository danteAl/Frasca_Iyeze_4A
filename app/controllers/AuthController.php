<?php
 
class AuthController extends BaseController {
 
    public function __construct() {
        $this->beforeFilter('auth', array('only' => 'getLogout'));
        $this->beforeFilter('guest', array('except' => 'getLogout'));
        $this->beforeFilter('csrf', array('on' => 'post'));
	}
 
    protected function createView($name)
    {
        return View::make($name, array('categories' => Categories::all(), 'actif' => -1)); 
    }  
 
    public function getLogin()
    {
        return $this->createView('auth.login');
    }
 
    public function getInscription()
    {
        return $this->createView('auth.inscription');
    }

    public function postLogin()
    {
        $user = array('pseudo' => Input::get('pseudo'),
        			  'password' => Input::get('password')
        		);
        
        //methode attempt memorise cette connexion dans un cookie si le deuxième paramètre a la valeur true
        if(Auth::attempt($user, Input::get('souvenir')))//Input::get('souvenir') renvoie true s'il est coche
        	return Redirect::intended('/')->with('flash_notice', 'Vous avez ete correctement connecte avec le pseudo ' . Auth::user()->pseudo);

		return Redirect::to('auth/login')->with('flash_error', 'Pseudo ou mot de passe non correct !')->withInput();       
    }
 
    public function postInscription()
    {
        $valide = User::validate(Input::all());
        
        if ($valide->passes()) {
        	$user = new User;
        	$user->pseudo = Input::get('pseudo');
        	$user->email = Input::get('email');
        	$user->password = Hash::make(Input::get('password'));
        	$user->save();
        	
            return Redirect::route('accueil')->with('flash_notice', 'Votre compte a ete cree.'); 
        }
        
        return Redirect::to('auth/inscription')->witherrors($valide)->withInput(); 
    }  
    
	public function getLogout()
    {
        Auth::logout();
        
        return Redirect::route('accueil')->with('flash_notice', 'Vous avez ete correctement deconnecte.');
    }
 
}