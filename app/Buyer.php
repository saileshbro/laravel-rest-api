<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaction;
class Buyer extends User
{
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
