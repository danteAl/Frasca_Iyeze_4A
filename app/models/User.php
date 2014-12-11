<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';
	
	protected $hidden = array('password');

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	public function getReminderEmail()
	{
		return $this->email;
	}

	public static function validate($input)
	{
		$rules = array(
			'pseudo' => 'required|Alpha|between:2,65|unique:users',
			'email' => 'required|email|unique:users',
			'password' => 'required|AlphaNum|between:6,20|confirmed'
		);
		
		$messages = array(
			'pseudo.required' => 'Nous avons besoin de votre pseudo.',
			'pseudo.Alpha' => 'Le pseudo doit etre compose de caracteres alphabetiques.',
			'pseudo.between' => 'Le nombre de caracteres du pseudo doit etre compris entre :min et :max.',
			'pseudo.unique' => 'Ce pseudo est deja utilise.',
			'email.required' => 'Nous avons besoin de votre adresse mail.',
			'email.email' => 'Le format de l\'adresse mail n\'est pas correct.',
			'email.unique' => 'Cette adresse mail est deja utilisee.',
			'password.required' => 'Nous avons besoin d\'un mot de passe.',
			'password.Alphanum' => 'Le pseudo doit etre compose de caracteres alphanumeriques.',
			'password.between' => 'Le nombre de caracteres du mot de passe doit etre compris entre :min et :max.',
			'password.confirmed' => 'La confirmation du mot de passe n\'est pas correcte.'
		);
		
		return Validator::make($input, $rules, $messages);
	}

}
