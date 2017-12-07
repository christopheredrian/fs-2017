<?php

namespace App\Http\Controllers;

use App\Ledger;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function income()
    {
        return view('report.income', [
            'start' => Transaction::orderBy('created_at','asc')->first()->created_at->toFormattedDateString(),
            'end' => Transaction::orderBy('created_at', 'desc')->first()->created_at->toFormattedDateString(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function balance()
    {
        return view('report.balance',[

        ]);
    }


}
