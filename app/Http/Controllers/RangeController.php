<?php

namespace App\Http\Controllers;

//use idealcoms\eadmin\Repositories\Catalog\BaseRangesRepository;

class RangeController extends Controller
{
	private $rangeRepository;
	
	/*
	public function __construct(BaseRangesRepository $rangeRepository)
	{
		$this->rangeRepository = $rangeRepository;
	}
	*/
	
	public function index()
	{
		$ranges = $this->rangeRepository->with(['translations', 'products'])->all();
		return response()->view('pages.gammes_liste', ['ranges' => $ranges]);
	}
	
	public function show($id)
	{
		/*
		$range = $this->rangeRepository->with(['translations', 'products'])->find($id);
		$ranges = $this->rangeRepository->with(['translations', 'products'])->all();
		if(is_null($range)) {
			abort(404, 'La gamme demandée n\'existe plus ou n\'a pas été trouvée.');
		}
		return view('pages.gammes_fiche',["range" => $range, "ranges" => $ranges ]);
		*/
		return response()->view('pages.gammes');
	}
	
	
}
