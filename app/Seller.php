<?php

namespace App;

use App\Scopes\SellerScope;
use Illuminate\Database\Eloquent\Model;
class Seller extends User
{
    public function products(){
        return $this->hasMany(Product::class);
    }
    protected static function boot()
    {
        parent::boot();
        self::addGlobalScope(new SellerScope());

    }
}
