<?php

namespace App;

use App\Scopes\SellerScope;
use App\Transformers\BuyerTransformer;

class Seller extends User
{
    public $transformer = BuyerTransformer::class;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function boot()
    {
        parent::boot();
        self::addGlobalScope(new SellerScope());

    }
}
