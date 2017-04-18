<?php

namespace App\Http\Controllers;

use Mailjet;
use Storage;

use App\Http\Controllers\GooogleDriveUtilities\GDUploader;

class DevController extends Controller
{
    public function index()
    {
    	
    	$mj = new \Mailjet\Client(env('MAIL_USERNAME'), env('MAIL_PASSWORD'));
    	
    	$body = [
		    'FromEmail' => "d.lechopier@gmail.com",
		    'FromName' => "Mailjet Pilot",
		    'Subject' => "Your email flight plan!",
		    'Text-part' => "Dear passenger, welcome to Mailjet! May the delivery force be with you!",
		    'Html-part' => "<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
		    'Recipients' => [['Email' => "extrembiker11@hotmail.com"]]
		];
    	
    	// Send mail
    	//$response = $mj->post(\Mailjet\Resources::$Email, ['body' => $body]);
    	 
    	
    	// Test Google Drive
    	$cloud = Storage::disk('google');
    	
    	// Creation d'un doc dans le drive
    	//$cloud->put('test.txt', 'Hello World');
    	    	
    	/*
    	// Création d'un dossier
    	if(!$cloud->exists('Factures')){
    		print_r("n'existe pas");
    		$cloud->makeDirectory("Factures");
    	}else{
    		print_r("already exist");
    	}
    	*/
    	
    	
    	$file = $cloud->get('0B5STB9FA0apeN2QwMG9CZkZWRmc');
    	//$size = $cloud->size('0B5STB9FA0apeN2QwMG9CZkZWRmc');
    	//$path = $file->getRealPath();
    	//$url = $file->url('file1.jpg');
    	//$cloud->read($file);
    	
    	print_r($file);
    	
    	// recup list documents du dossier
    	$datas = $cloud->allFiles();
    	
    	
    	
    	return view('pages.dev',[
    			'datas' => $datas,
    			
    	]);
    }
}
