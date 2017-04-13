<?php

namespace App\Http\Controllers;

use idealcoms\eadmin\Repositories\Catalog\BaseRangesRepository;
use Mailjet;

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
    	 
    	$datas = array("user" => "Dams", "profil" => "admin");
    	
    	
    	return view('pages.dev',[
    			'datas' => $datas,
    	]);
    }
}
