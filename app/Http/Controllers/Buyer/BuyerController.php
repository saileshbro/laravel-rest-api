<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->showAll((new Buyer)->has("transactions")->get());
    }

    public function show(Buyer $buyer){

        if($buyer->transactions()->count()){
            return $this->showOne($buyer);
        }else{
        throw new ModelNotFoundException();
        }

    }
}
