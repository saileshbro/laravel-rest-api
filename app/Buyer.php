<?php

namespace App;

use App\Scopes\BuyerScope;
use Illuminate\Database\Eloquent\Model;
use App\Transaction;
class Buyer extends User
{
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    protected static function boot()
    {
        parent::boot();
        self::addGlobalScope(new BuyerScope());
    }

}
