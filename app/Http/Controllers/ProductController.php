<?php

namespace App\Http\Controllers;

use idealcoms\eadmin\Repositories\Catalog\BaseAccessoryRepository;
use idealcoms\eadmin\Repositories\Catalog\BaseProductsRepository;

class ProductController extends Controller
{
    private $productRepository;
    private $accessoryRepository;

    /**
     * ProductController constructor.
     * @param BaseProductsRepository $productRepository
     * @param BaseAccessoryRepository $accessoryRepository
     */
    public function __construct(BaseProductsRepository $productRepository, BaseAccessoryRepository $accessoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->accessoryRepository = $accessoryRepository;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productRepository->with(['translations', 'ranges', 'accessories', 'families', 'visuals', 'files', 'documents'])->find($id);
        if (is_null($product)) {
            abort(404, 'Produit non trouvé ou existant.');
        }

        //get previous and next product
        $paginate = $this->paginate($product, $id);
        
        $subTitle = "";

        foreach ($product->families as $index => $family) {
            if (isset($family->types[0])) {
                if (!is_null($family->types[0]->title)) {
                    // 2016.09.20 Modifs demandées par mg
                    $subTitle .= $family->types[0]->title . ' ' . $family->title. ', ';
                }
            }
        }
        $subTitle = substr($subTitle, 0, -2);
        return response()->view('pages.produits', [
        	'id' => $id,
        	'product' => $product,
            'subTitle' => $subTitle,
            'accessories' => $product->accessories,
            'previous' => $paginate['previous'],
            'next' => $paginate['next']
        ]);
    }

    /**
     * Get previous and next product by product id
     *
     * @param $product the current product
     * @param $id the product id
     * @return array $paginate
     */
    public function paginate($product, $id)
    {
        $allProducts = $this->productRepository->with(['translations'])->all(['id']);
        $firstProduct = $this->productRepository->with(['translations'])->first(['id']);
        $lastProduct = $this->productRepository->with(['translations'])->orderBy('id', 'desc')->first(['id']);

        if ($allProducts->find($product)) {

            $currentProduct = $allProducts->find($product);
            if ($currentProduct->id === $lastProduct->id) {
                $previous = $this->productRepository->findWhere([['id', '<', $lastProduct->id]])->first();
                $next = $allProducts->first();
            } elseif ($currentProduct == $allProducts->first()) {
                $previous = $lastProduct;
                $next = $this->productRepository->findWhere([['id', '>', $firstProduct->id]])->first();
            } else {
                $previous = $this->productRepository->findWhere([['id', '<', $id]])->first();
                $next = $this->productRepository->findWhere([['id', '>', $id]])->first();
            }
        }

        $paginate = array();
        $paginate['previous'] = $previous;
        $paginate['next'] = $next;
        return $paginate;
    }
}
