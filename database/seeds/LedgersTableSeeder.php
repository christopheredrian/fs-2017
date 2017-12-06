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
        $faker = Faker\Factory::create();
        foreach (Transaction::all() as $transaction) {
            $amount = $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 100000);
            // Debit
            Ledger::insert([
                'debit' => $amount,
                'credit' => 0,
                'account_id' => $faker->randomElement(\App\Account::all()->pluck('id')->toArray()),
                'transaction_id' => $transaction->id
            ]);
            // Credit
            Ledger::insert([
                'debit' => 0,
                'credit' => $amount,
                'account_id' => $faker->randomElement(\App\Account::all()->pluck('id')->toArray()),
                'transaction_id' => $transaction->id
            ]);

        }
    }

}
