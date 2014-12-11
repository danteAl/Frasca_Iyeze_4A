<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Jokes extends Eloquent {

	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	protected $fillable = array('title', 'story', 'id_author', 'id_category', 'green');

	public static function validate($input) {
		
		$rules = array(
				'title' => 'required|between:1,150',
				'story' => 'required'
		);
		
		$messages = array(
				'title.required' => 'Voyez rajouter un titre à votre blague.',
				'title.between' => 'Le nombre de caracteres du titre doit etre compris entre :min et :max.',
				'story.required' => 'Voyez rajouter une histoire à votre blague.'
		);
		
		return Validator::make($input, $rules, $messages);
		
	}
	
}