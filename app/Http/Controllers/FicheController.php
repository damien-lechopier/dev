<?php

namespace App\Http\Controllers;

use idealcoms\eadmin\Repositories\Catalog\BaseAccessoryRepository;
use idealcoms\eadmin\Repositories\Catalog\BaseRangesRepository;

class FicheController extends Controller
{
	private $baseRangesRepository;
    private $accessoryRepository;

    /**
     * FicheController constructor.
     * @param BaseRangesRepository $baseRangesRepository
     * @param BaseAccessoryRepository $accessoryRepository
     */
	public function __construct(BaseRangesRepository $baseRangesRepository, BaseAccessoryRepository $accessoryRepository)
	{
		$this->baseRangesRepository = $baseRangesRepository;
        $this->accessoryRepository = $accessoryRepository;
	}

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
	public function show($id)
	{
        $fiche = $this->baseRangesRepository->with(['translations', 'products', 'accessories', 'types'])->find($id);
        if(is_null($fiche)) {
            abort(404, 'Fiche technique non trouvé ou existante.');
        }
        $accessoriesId = $fiche->accessories->lists('id')->toArray();
        $modules = $this->accessoryRepository->with(['visuals'])->findWhereIn('id', $accessoriesId);
		return response()->view('pages.fiche', ['id' => $id, 'fiche' => $fiche, 'modules' => $modules]);
	}
}
