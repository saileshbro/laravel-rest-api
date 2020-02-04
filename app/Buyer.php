<?php

namespace App;

use App\Scopes\BuyerScope;
use App\Transformers\BuyerTransformer;

class Buyer extends User
{
    public $transformer = BuyerTransformer::class;

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    protected static function boot()
    {
        parent::boot();
        self::addGlobalScope(new BuyerScope());
    }

}
