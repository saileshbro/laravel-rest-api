<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Seller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->showAll((new Seller)->has("products")->get());
    }

    /**
     * Display the specified resource.
     *
     * @param Seller $seller
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Seller $seller)
    {
        if($seller->products()->count()){
            return $this->showOne($seller);
        }else
            throw new ModelNotFoundException();
    }
}
