<?php

namespace App\Http\Controllers;

use App\Account;
use App\Ledger;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('journals.create'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('journal.create',[
            'accounts' => Account::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::transaction(function() use ($request){
            $transaction = new Transaction();
            $transaction->save();
            // Debit accounts
            foreach($request->debit_account as $counter => $account_code){
                $ledger = new Ledger();
                $ledger->account_id = $account_code;
                $ledger->transaction_id = $transaction->id;
                $ledger->debit = $request->debit[$counter];
                $ledger->credit = 0;
                $ledger->save();
            }
            // Credit Accounts
            foreach($request->credit_account as $counter => $account_code){
                $ledger = new Ledger();
                $ledger->account_id = $account_code;
                $ledger->transaction_id = $transaction->id;
                $ledger->debit = 0;
                $ledger->credit = $request->credit[$counter];
                $ledger->save();
            }
        });
        Session::flash('flash_message', 'Jouranl Posted successfully!');
        return redirect(route('journals.create'));
    }

//    public function rules() {
//        $rules = [];
//
//        foreach($this->input('candidates') as $key => $value) {
//            $rules["candidates.{$key}.candidate_number"] = ['required', 'numeric'];
//            $rules["candidates.{$key}. givennames"] = ['required'];
//        }
//
//        return $rules;
//    }

}
