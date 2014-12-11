<?php
//créé en utilisant la commande 'php artisan auth:reminders-controller'
class RemindersController extends Controller {
 
    public function getRemind()
    {
        return View::make('auth.remind', array('categories' => Categories::all(), 'actif' => -1));
    }
 
    public function postRemind()
    {
        $response = Password::remind(Input::only('email'), function($message)
        {
          $message->subject('Oubli du mot de passe.');
        });
        switch ($response)
        {
            case Password::INVALID_USER:
                return Redirect::back()->with('error', Lang::get($response))->withInput();
 
            case Password::REMINDER_SENT:
                return Redirect::back()->with('status', Lang::get($response))->withInput();
        }
    }
 
    public function getReset($token = null)
    {
        if (is_null($token)) App::abort(404);
 
        return View::make('auth.reset', array('categories' => Categories::all(), 'actif' => -1, 'token' => $token));
    }
 
    public function postReset()
    {
        $credentials = Input::only(
            'email', 'password', 'password_confirmation', 'token'
        );
 
        $response = Password::reset($credentials, function($user, $password)
        {
            $user->password = Hash::make($password);
 
            $user->save();
        });
 
        switch ($response)
        {
            case Password::INVALID_PASSWORD:
            case Password::INVALID_TOKEN:
            case Password::INVALID_USER:
                return Redirect::back()->with('error', Lang::get($response))->withInput();
 
            case Password::PASSWORD_RESET:
                return Redirect::to('auth/login');
        }
    }
 
}
