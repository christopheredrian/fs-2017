<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //

    protected $fillable = [
        'name', 'code', 'type'
    ];

    public function ledgers(){
        return $this->hasMany(Ledger::class);
    }
}
