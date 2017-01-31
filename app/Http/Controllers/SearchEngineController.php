<?php

namespace App\Http\Controllers;

use idealcoms\eadmin\Repositories\Catalog\BaseFamilyRepository;
use idealcoms\eadmin\Repositories\Catalog\BaseRangesRepository;
use idealcoms\eadmin\Repositories\Catalog\BaseSiteRepository;
use idealcoms\eadmin\Repositories\Catalog\BaseTypeRepository;
use idealcoms\eadmin\Repositories\Catalog\BaseUseCaseRepository;

class SearchEngineController extends Controller
{
    private $rangeRepository,
            $familiesRepository,
            $sitesRepository,
            $typesRepository;
    private $useCaseRepository;

    public function __construct(BaseRangesRepository $rangesRepository,
                                BaseFamilyRepository $familiesRepository,
                                BaseSiteRepository $siteRepository,
                                BaseTypeRepository $typesRepository,
                                BaseUseCaseRepository $useCaseRepository)
    {
        $this->rangeRepository = $rangesRepository;
        $this->familiesRepository = $familiesRepository;
        $this->sitesRepository = $siteRepository;
        $this->typesRepository = $typesRepository;
        $this->useCaseRepository = $useCaseRepository;
    }

    public function index(Request $request)
    {
        $response = $this->getResponse();

        if (Session::get('last_results')) {
            $response['resultsSites'] = Session::get('last_results');
        }

        if (!is_null(Session::get('last_criterias')) && is_array(Session::get('last_criterias'))) {
            foreach (Session::get('last_criterias') as $item => $value) {
                $response[$item] = $value;
            }
        }

        if($request->has('site_id')) {
            $currentSite = $this->sitesRepository->with(['translations', 'range', 'families', 'visuals'])->find($request->get('site_id'));
            $response['site_id'] = $request->get('site_id');
            $response['currentSite'] = $currentSite;
        }

        return response()->view('pages.references', $response);
    }

    public function search(Request $request)
    {
        $returnSites = array();
        $sessionCriterias = array();

        $response = $this->getResponse();

        if($request->has('range_id')) {
            $returnSites = $this->sitesRepository->with(['translations', 'range', 'families'])->findByField(['range_id' => $request->get('range_id')]);
            $searchedRange = $this->rangeRepository->with(['translations'])->find($request->get('range_id'));
            $response['searchedRange'] = $searchedRange;
            $sessionCriterias['searchedRange'] = $searchedRange;
            logger('param range_id' . $request->get('range_id') . ', '. count($returnSites). 'results');
        }

        if($request->has('family_id')) {
            if(empty($returnSites)) {
                $returnSites = $this->sitesRepository->with(['translations', 'range', 'families'])->all();
            } else {
                foreach ($returnSites as $key => $returnSite) {
                    if($returnSite->families()) {
                        $byFamily = $returnSite->families()->where(['family_id' => $request->get('family_id')])->get();
                        if(empty($byFamily)) {
                            unset($returnSites[$key]);
                        }
                    }
                }
            }
            $searchedFamily = $this->familiesRepository->with(['translations'])->find($request->get('family_id'));
            $response['searchedFamily'] = $searchedFamily;
            $sessionCriterias['searchedFamily'] = $searchedFamily;
            logger('param family_id ' . $request->get('family_id') . ', '. count($returnSites). ' results');
        }

        if($request->has('department')) {
            if(empty($returnSites)) {
                $returnSites = $this->sitesRepository->with(['translations', 'range', 'families'])->findByField(['department' => $request->get('department')]);
            } else {
                foreach ($returnSites as $key => $returnSite) {
                    if($returnSite->department != $request->get('department')) {
                        unset($returnSites[$key]);
                    }
                }
            }
            $searchedDepartment = $request->get('department');
            $response['searchedDepartment'] = $searchedDepartment;
            $sessionCriterias['searchedDepartment'] = $searchedDepartment;

            logger('param department ' . $request->get('department') . ', '. count($returnSites). ' results');
        }


        if($request->has('country')) {
            $returnSites = $this->sitesRepository->with(['translations', 'range', 'families', 'visuals'])->findByField(['country' => $request->get('country')]);
            $response['searchedCountry'] = $request->get('country');
            $sessionCriterias['searchedCountry'] = $request->get('country');
            logger('param country ' . $request->get('country') . ', '. count($returnSites). ' results');
        }

        if($request->get('french_site')) {
            $returnSites = $this->sitesRepository->with(['translations', 'range', 'families', 'visuals'])->find($request->get('french_site'));
            logger('param french_site ' . $request->get('french_site') . ', '. count($returnSites). ' results');
        }
        if($request->get('type_id')) {
            $returnSites = $this->sitesRepository->pushCriteria(new HavingTypeCriteria([$request->get('type_id')]))
                ->with(['translations', 'range', 'families', 'visuals'])->all();
            $response['searchedType'] = $request->get('type_id');
            $sessionCriterias['searchedType'] = $request->get('type_id');
            logger('param type_id ' . $request->get('type_id') . ', '. count($returnSites). ' results');
        }
        if ($request->get('site_selection')) {
            $response['site_selection'] = true;
            $sessionCriterias['site_selection'] = true;
        }

        if($request->get('usecase_id')) {
            $usecases = $this->useCaseRepository->with('sites')->all();
            foreach($usecases as $usecase) {
                foreach ($usecase->sites as $site) {
                    $returnSites[] = $site;
                }
            }
            $returnSites = array_unique($returnSites);
            $response['searchedUseCase'] = $request->get('usecase_id');
            $sessionCriterias['searchedUseCase'] = $request->get('usecase_id');

            logger('param usecase_id ' . $request->get('usecase_id') . ', '. count($returnSites). ' results');
        }

        if (!is_null($returnSites) && count($returnSites)) {
            $response['currentSite'] = $returnSites[0];
        }
        $response['resultsSites'] = $returnSites;

        if($request->has('site_id')) {
            $currentSite = $this->sitesRepository->with(['translations', 'range', 'families', 'visuals'])->find($request->get('site_id'));
            $response['site_id'] = $request->get('site_id');
            $response['currentSite'] = $currentSite;
            $sessionCriterias['currentSite'] = $currentSite;
            logger('param site_id ' . $request->get('site_id') . ', '. count($returnSites). ' results');
        }



        // Store results
        Session::put('last_criterias', $sessionCriterias);
        Session::put('last_results', $returnSites);

        return response()->view('pages.references', $response);
    }

    protected function getResponse()
    {
        $ranges = $this->rangeRepository->with(['translations'])->all();
        $families = $this->familiesRepository->with(['translations', 'products'])->all();
        $types = $this->typesRepository->with(['translations'])->all();
        $usecases = $this->useCaseRepository->all();
        $departments = config('departments_list.departments');
        $countries = config('countries_list.countries');
        $sites = $this->sitesRepository->with(['translations'])->findWhere(['status' => 'published', 'urban' => true])->all();
        //$privateSites = $this->sitesRepository->with(['translations'])->findWhere(['status' => 'published', 'urban' => false])->all();
//        $frenchSite = $this->sitesRepository->with(['translations', 'range', 'families', 'files'])->scopeQuery(function ($query) {
//            return $query->orderBy('id', 'RAND()');
//        })->findWhere(['country' => 'FR']);
//
//        if(count($frenchSite)>0) {
//            $frenchSite = $frenchSite[0];
//        } else {
//            $frenchSite = null;
//        }

        $searchRanges = ["" => trans('content.references.form.1.select.1.default')];
        $searchTypes = ["" => trans('content.references.form.3.select.1.default')];
        $searchFamilies = ["" => trans('content.references.form.1.select.2.default')];
        $searchSites = [];
        //$searchPrivateSites = [];
        $searchDepartments = ["" => trans('content.references.form.1.select.3.default')];
        $searchUsecases = ["" => trans('content.references.form.5.select.1.default')];

        foreach ($ranges as $range) {
            $searchRanges[$range->id] = $range->title;
        }

        foreach ($types as $type) {
            $searchTypes[$type->id] = $type->title;
        }

        foreach ($families as $family) {
            $searchFamilies[$family->id] = $family->title;
        }

        foreach ($sites as $site) {
            $searchSites[$site->id] = $site->title;
        }

        foreach ($usecases as $usecase) {
            $searchUsecases[$usecase->id] = $usecase->title;
        }

//        foreach ($privateSites as $privateSite) {
//            $searchPrivateSites[$privateSite->id] = $privateSite->title;
//        }

        foreach ($departments as $num => $name) {
            $searchDepartments[$num] = $name;
        }

        $returnSites = [];

        $sites = $this->sitesRepository->all('country');
        $used_countries = array();
        foreach ($sites as $site) {
            if (!array_key_exists($site->country, $used_countries)) {
                $used_countries[$site->country] = config('countries_list.countries')[$site->country];
            }
        }

        return  [
                'searchRanges'       => $searchRanges,
                'searchTypes'       => $searchTypes,
                'searchFamilies'     => $searchFamilies,
                'departments'        => $searchDepartments,
                'countries'          => $used_countries,
                'searchSites'        => $searchSites,
//                'searchPrivateSites' => $searchPrivateSites,
                'resultsSites'       => $returnSites,
//                'currentSite'         => $frenchSite,
                'searchUsecases'     => $searchUsecases
            ];
    }
}
