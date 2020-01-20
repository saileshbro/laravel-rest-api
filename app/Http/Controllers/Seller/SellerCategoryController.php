<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Seller;

class SellerCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Seller $seller
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Seller $seller)

    {
        $categories = $seller->products()->whereHas('categories')->with('categories')->get()->pluck('categories')->collapse()->unique('id')->values();
        return $this->showAll($categories);
    }

}
