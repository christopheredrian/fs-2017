<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q;

        if ($q){
            $transactions = DB::table('ledgers')
                ->join('transactions', 'ledgers.transaction_id', '=', 'transactions.id')
                ->join('accounts', 'ledgers.account_id', '=', 'accounts.id')
                ->select('transactions.id', 'transactions.created_at as created_at', 'code', 'name', 'debit', 'credit')
                ->where('transactions.id', 'LIKE', '%' . $q . '%')
                ->orWhere('transactions.created_at', 'LIKE', '%' . $q . '%')
                ->orWhere('code', 'LIKE', '%' . $q . '%')
                ->orWhere('name', 'LIKE', '%' . $q . '%')
                ->orWhere('debit', 'LIKE', '%' . $q . '%')
                ->orWhere('credit', 'LIKE', '%' . $q . '%')
                ->paginate(15);
//            $transactions = Transaction::with('ledgers', function($query) use ($q) {
//                dd();
//                $query->where('id', 'LIKE', '%' . $q . '%');
//            })->get();
        } else{
            $transactions = DB::table('ledgers')
                ->join('transactions', 'ledgers.transaction_id', '=', 'transactions.id')
                ->join('accounts', 'ledgers.account_id', '=', 'accounts.id')
                ->select('transactions.id', 'transactions.created_at as created_at', 'code', 'name', 'debit', 'credit')
                ->orderBy('transactions.id')
                ->paginate(15);
        }

        return view('ledger.index',[
            'transactions' => $transactions,
            'q' => $request->q
        ]);
    }


}
