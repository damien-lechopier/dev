<?php

namespace App\Http\Controllers;

use idealcoms\eadmin\Repositories\Catalog\BaseRangesRepository;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.accueil');
    }
}
