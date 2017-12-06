<?php

use Illuminate\Database\Seeder;
use App\Transaction;
use App\Ledger;

class LedgersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Transaction::all() as $transaction) {

            // Debit
            Ledger::insert([
                'id' => 1,
                'debit' => 100,
                'credit' => 0,
                'account_id' => '1',
                'transaction_id' => $transaction->id
            ]);
            // Credit
            Ledger::insert([
                'id' => 1,
                'debit' => 0,
                'credit' => 100,
                'account_id' => '1',
                'transaction_id' => $transaction->id
            ]);

        }
    }
