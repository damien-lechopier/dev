<?php

namespace App\Http\Controllers;

use idealcoms\eadmin\Repositories\Catalog\BaseFamilyRepository;
use idealcoms\eadmin\Repositories\Catalog\BaseProductsRepository;

class FamilyController extends Controller
{
    private $familyRepository;
    private $productsRepository;

    public function __construct(BaseFamilyRepository $familyRepository, BaseProductsRepository $productsRepository)
    {
        $this->familyRepository = $familyRepository;
        $this->productsRepository = $productsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $family = $this->familyRepository->with(['translations', 'linkProducts', 'files', 'types'])->find($id);
        if (is_null($family)) {
            abort(404, 'Famille non trouvé ou existante.');
        }
        $allProducts = $family->linkProducts;
        
        $products = collect($allProducts)->where('status', 'published')->sortBy('position');
        return response()->view('pages.families', ["id" => $id, "family" => $family, "products" => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
