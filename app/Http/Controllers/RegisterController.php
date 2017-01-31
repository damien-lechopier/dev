<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RegisterRequest;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use App\Models\User;

use App\Repositories\UserRepository;

class RegisterController extends Controller
{
	/**
	 * 
	 * @var UserRepository $userRepository
	 */
	protected $userRepository;
	
	
    /**
     * Constructor
     * 
     * @param UserRepository $userRepository
     * @param ContactRepository $contactRepository
     */
    public function __construct(UserRepository $userRepository)
    {
    	$this->userRepository = $userRepository;
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	
    	return view('pages.contact',[
    			"mode" => "register"
    			]);
    }
   
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest  $request)
    {
    	// On test si l'utilisateur existe déjà
    	$existing = $this->userRepository->findWhere(["email" => $request->get('email')])->first();
			if (is_null($existing)) {
				
				Log::info('Création de l\'utilisateur');
				
				$user = $this->userRepository->create($request->all());
				$user->password = bcrypt($request->get('password'));
				$user->pays = $request->get('id_pays');
				$user->status = config("constants.statuses.VALIDATED");
				$user->save();
				
			}else{
				Log::info('User déjà existant');
				return $this->index()->with(['mode' => 'register', 'message' => trans('content.register.message.erreur.user_already_exist')]);
			}
    	
    	/* Pas d'email pr une inscription
        Mail::send('emails.contact', ['data' => $request->all()],  function ($message) {
        	Log::info('Envoi de l\'email au client');
        	$message->subject("GALVATEK - Demande de contact");
        	$message->from('suivi@idealcoms.net', 'Service client Galvatek');
        	//$message->to('info@galvatek.fr');
        	$message->bcc('suivi_technique@idealcoms.net');
        	//$message->bcc('suivi@idealcoms.net');
        });
        */ 

       
   	return $this->index()->with(['mode' => 'register', 'message_validation' => trans('content.register.messagevalidation')]);
    }
   
}
