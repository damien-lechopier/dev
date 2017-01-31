<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

//use App\Http\Requests\Request;


class CalculController extends Controller
{
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('pages.calcul');
    }
   
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalculRequest  $request)
    {
    	
        Mail::send('emails.calcul', ['data' => $request->all()],  function ($message) use ($request) {
        	Log::info('Envoi de l\'email au client');
        	if($request->file('fichier')){
	        	$message->attach($request->file('fichier')->getRealPath(), array(
	        			'as' => 'fichier.'.$request->file('fichier')->getClientOriginalExtension(),
	        			'mime' => $request->file('fichier')->getMimeType())
	        			);
        	}
        	$message->subject("GALVATEK - Calcul de puissance");
        	$message->from('suivi@idealcoms.net', 'Service client Galvatek');
        	$message->replyTo($request->email);
        	$message->to('info@galvatek.fr');
        	$message->bcc('suivi_technique@idealcoms.net');
        	$message->bcc('suivi@idealcoms.net');
        });

       
    	return $this->index()->with(['message_validation' => trans('content.contact.messagevalidation')]);
    }
}
