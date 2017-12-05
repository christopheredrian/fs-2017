<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ledger.index',[
            'transactions' => Transaction::all()
        ]);
    }


}
