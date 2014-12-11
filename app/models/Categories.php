<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Categories extends Eloquent {
	
	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	protected $fillable = array('category');

}