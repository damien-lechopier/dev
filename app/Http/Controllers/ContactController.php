<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests\Request;
use App\Http\Requests\ContactRequest;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Http\Requests;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use App\Models\Contact;

use idealcoms\eadmin\Repositories\Contact\ContactRepository;

class ContactController extends Controller
{
	
	/**
	 * 
	 * @var ContactRepository $contactRepository
	 */
    protected $contactRepository;
    
    /**
     * Constructor
     * 
     * @param UserRepository $userRepository
     * @param ContactRepository $contactRepository
     */
    public function __construct(ContactRepository $contactRepository)
    {
    	$this->contactRepository = $contactRepository;
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	
    	$contact_id_sujet = "";
    	// Pour sujet pré-défini
    	if(Session::get('contact_id_sujet')){
    		$contact_id_sujet = Session::get('contact_id_sujet');
    	}
    	
    	
    	return view('pages.contact',[
    			"mode" => "contact",
    			"contact_id_sujet" => $contact_id_sujet
    			]);
    }
   
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest  $request)
    {
    	
    	Log::info('Enregistrement simple du contact dans la BDD sans création d\'utilisateur');
	    $contact = $this->contactRepository->create($request->all());
	    $contact->save();
    	
    	
        Mail::send('emails.contact', ['data' => $request->all()],  function ($message) use ($request) {
        	Log::info('Envoi de l\'email au client');
        	$message->subject("GALVATEK - Demande de contact");
        	$message->from('suivi@idealcoms.net', 'Service client Galvatek');
        	$message->replyTo($request->email);
        	$message->to('info@galvatek.fr');
        	$message->bcc('suivi_technique@idealcoms.net');
        	$message->bcc('suivi@idealcoms.net');
        });

       
        //return view('pages.contact',['message_validation' => trans('content.contact.messagevalidation')]);
		return $this->index()->with(['mode' => 'contact', 'message_validation' => trans('content.contact.messagevalidation')]);
    }
    
    /**
     * Stocke une variable de session pour avoir un sujet pré-selectionné par défaut
     *
     */
    public function contactForSubject($id_sujet)
    {
    	Session::put('contact_id_sujet', $id_sujet);
    	return Redirect::route('contact.index');
    }
}
