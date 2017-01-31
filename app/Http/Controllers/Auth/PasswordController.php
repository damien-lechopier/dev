<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
	
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    
    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }
    
    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendResetLinkEmail(Request $request)
    {
    	
    	$this->validateSendResetLinkEmail($request);
    	 
    	$broker = $this->getBroker();
    	
    	$this->subject = "GALVATEK - ".trans('auth.password.title');
    	
    	$response = Password::broker($broker)->sendResetLink(
    			$this->getSendResetLinkEmailCredentials($request),
    			$this->resetEmailBuilder()
    			);
    	
    	
    	switch ($response) {
    		case Password::RESET_LINK_SENT:
    			// plus nécessaire depuis que j'ai passé StartSession et ShareErrorsFromSession dans $middleware (fichier Kernel.php)
    			//return view('auth.passwords.email')->with(['status' => trans($response), 'message' => trans('auth.password.send_mail_validation_message')]);
    			return $this->getSendResetLinkEmailSuccessResponse($response);
    		case Password::INVALID_USER:
    		default:
    			// plus nécessaire depuis que j'ai passé StartSession et ShareErrorsFromSession dans $middleware (fichier Kernel.php)
    			//return view('auth.passwords.email')->withErrors(['email' => trans($response)]);
    			return $this->getSendResetLinkEmailFailureResponse($response);
    	}
    }
    
    
    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request)
    {
    	$this->validate(
    			$request,
    			$this->getResetValidationRules(),
    			$this->getResetValidationMessages(),
    			$this->getResetValidationCustomAttributes()
    			);
    	
    	$credentials = $this->getResetCredentials($request);
    
    	$broker = $this->getBroker();
    
    	$response = Password::broker($broker)->reset($credentials, function ($user, $password) {
    		$this->resetPassword($user, $password);
    	});
    
    		switch ($response) {
    			case Password::PASSWORD_RESET:
    				return view('pages.accueil')->with(['status' => trans($response), 'message' => trans('auth.password.send_mail_validation_renew_message')]);
    				//return $this->getResetSuccessResponse($response);
    			default:
    				//return view('auth.passwords.reset')->withInput($request->only('email'))->withErrors(['email' => trans($response)]);
    				return $this->getResetFailureResponse($request, $response);
    		}
    }
    
}
