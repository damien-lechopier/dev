<?php

namespace App\Http\Controllers;

use idealcoms\eadmin\Repositories\Catalog\BaseFamilyTypeRepository;

class TypeController extends Controller
{
	private $familyTypeRepository;

    public function __construct(BaseFamilyTypeRepository $familyTypeRepository)
	{
		$this->familyTypeRepository = $familyTypeRepository;
	}

	
	public function show($id)
	{
        $familyType = $this->familyTypeRepository->find($id);
        if(is_null($familyType)) {
            abort(404, 'Type de famille non trouvé ou existant.');
        }
		return response()->view('pages.types', ['idTypeCategory' => $id, 'typeName' => $familyType->name]);
	}
	
	
}
