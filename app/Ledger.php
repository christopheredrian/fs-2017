<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    /**
     * Account associated with the current ledger
     */
    public function account(){
        return $this->belongsTo(Account::class);
    }
}
