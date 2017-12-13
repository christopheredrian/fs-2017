<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['created_at'];

    /**
     * Get all ledger associated with this transaction
     */
    public function ledgers(){
        return $this->hasMany(Ledger::class);
    }

}
