<?php

namespace App\Http\Controllers;

use App\Account;
use App\Ledger;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function income()
    {
        $sql_queries = [];
        $types = ['Inc'];
        $ids = Account::whereIn('type', $types)->pluck('id');
        $sumDebitIncome = Ledger::whereIn('account_id', $ids)->sum('debit');
        $sumCreditIncome = Ledger::whereIn('account_id', $ids)->sum('credit');
        $income = $sumCreditIncome - $sumDebitIncome;

        $unearnedServiceIncome = Account::where('code', '305')->first()->ledgers->sum('credit');


        $types = ['Expenses'];
        $ids = Account::whereIn('type', $types)->pluck('id');
        $sumDebitExpenses = Ledger::whereIn('account_id', $ids)->sum('debit');
        $sumCreditExpenses = Ledger::whereIn('account_id', $ids)->sum('credit');
        $expenses = $sumDebitExpenses - $sumCreditExpenses;

        return view('report.income', [
            'start' => Transaction::orderBy('created_at', 'asc')->first()->created_at->toFormattedDateString(),
            'end' => Transaction::orderBy('created_at', 'desc')->first()->created_at->toFormattedDateString(),
            'income' => $income + $unearnedServiceIncome,
            'expenses' => $expenses,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function balance()
    {
        // CA, PPE, CL, CAP, NCL

        $ca = Account::where('type', 'CA')->get();
        $ppe = Account::where('type', 'PPE')->get();

        return view('report.balance', [
            'ca' => $ca,
            'ppe' => $ppe
        ]);
    }


}
