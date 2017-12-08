<?php

use Illuminate\Database\Seeder;
use App\Transaction;
use App\Ledger;
use Illuminate\Support\Facades\Storage;

class LedgersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker = Faker\Factory::create();
//        foreach (Transaction::all() as $transaction) {
//            $amount = $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 100000);
//            // Debit
//            Ledger::insert([
//                'debit' => $amount,
//                'credit' => 0,
//                'account_id' => $faker->randomElement(\App\Account::all()->pluck('id')->toArray()),
//                'transaction_id' => $transaction->id
//            ]);
//            // Credit
//            Ledger::insert([
//                'debit' => 0,
//                'credit' => $amount,
//                'account_id' => $faker->randomElement(\App\Account::all()->pluck('id')->toArray()),
//                'transaction_id' => $transaction->id
//            ]);

//        }

        $filename = base_path('/storage/app/ledger.csv');
        $file = fopen($filename, "r");
        $all_data = array();
        while (($data = fgetcsv($file, 200, ",")) !== FALSE) {
            print_r($data);
            print_r($data[1]);
            Ledger::insert([
                'debit' => (double)$data[3],
                'credit' => (double)$data[4],
                'account_id' => \App\Account::where('code', $data[2])->first()->id,
                'transaction_id' => $data[0]
            ]);
        }

        // Monthly
        Ledger::insert([
            'debit' => 50000,
            'credit' => 0,
            'account_id' => \App\Account::where('code', '420')->first()->id,
            'transaction_id' => 30
        ]);

        Ledger::insert([
            'debit' => 0,
            'credit' => 50000,
            'account_id' => \App\Account::where('code', '710')->first()->id,
            'transaction_id' => 30
        ]);

        Ledger::insert([
        'debit' => 60000,
        'credit' => 0,
        'account_id' => \App\Account::where('code', '420')->first()->id,
        'transaction_id' => 30
    ]);

        Ledger::insert([
            'debit' => 0,
            'credit' => 60000,
            'account_id' => \App\Account::where('code', '710')->first()->id,
            'transaction_id' => 30
        ]);

        Ledger::insert([
            'debit' => 10000,
            'credit' => 0,
            'account_id' => \App\Account::where('code', '840')->first()->id,
            'transaction_id' => 30
        ]);

        Ledger::insert([
            'debit' => 0,
            'credit' => 10000,
            'account_id' => \App\Account::where('code', '130')->first()->id,
            'transaction_id' => 30
        ]);

        // Yearly
        Ledger::insert([
            'debit' => (double) 200,
            'credit' => 0,
            'account_id' => \App\Account::where('code', '880')->first()->id,
            'transaction_id' => 50
        ]);
        Ledger::insert([
            'debit' => 0,
            'credit' => 200,
            'account_id' => \App\Account::where('code', '215')->first()->id,
            'transaction_id' => 50
        ]);

        Ledger::insert([
            'debit' => 300,
            'credit' => 0,
            'account_id' => \App\Account::where('code', '880')->first()->id,
            'transaction_id' => 50
        ]);

        Ledger::insert([
            'debit' => 0,
            'credit' => 300,
            'account_id' => \App\Account::where('code', '225')->first()->id,
            'transaction_id' => 50
        ]);

        Ledger::insert([
            'debit' => 100,
            'credit' => 0,
            'account_id' => \App\Account::where('code', '880')->first()->id,
            'transaction_id' => 50
        ]);
        Ledger::insert([
            'debit' => 0,
            'credit' => 100,
            'account_id' => \App\Account::where('code', '235')->first()->id,
            'transaction_id' => 50
        ]);

    }

}
