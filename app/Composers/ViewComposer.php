<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcalvez
 * Date: 01/09/16
 * Time: 15:48
 */

namespace App\Composers;


use idealcoms\eadmin\Repositories\Catalog\BaseRangesRepository;
use Illuminate\View\View;

class ViewComposer
{
    protected $fichesRepository;

    public function __construct(BaseRangesRepository $baseRangesRepository)
    {
        $this->fichesRepository = $baseRangesRepository;
    }

    public function compose(View $view)
    {
        $fiches = $this->fichesRepository->with(['translations', 'types'])->findWhere(['status' => config('constants.statuses.PUBLISHED')]);
        $view->with('fiches', $fiches);
    }
}