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

        $filename = base_path('/storage/app/journals.csv');
        $file = fopen($filename, "r");
        $counter = 1;
        while (($data = fgetcsv($file, 200, ",")) !== FALSE) {
            echo "\nDATA (# $counter):\n";
            print_r($data);
            if ($data[1]) {
                $current_transaction = new Transaction();
                $date = new \Carbon\Carbon();
                $date->year = 2016;
                $date->month = (int)$data[0];
                $date->day = (int)$data[1];
                $current_transaction->created_at = $date;
                $current_transaction->save();
                $t_id = $current_transaction->id;

            }
            // If we have a debit and credit value
            echo "My Data Above Debit and Credit: ";
            // if debit
            if ($data[5]) {
                echo "D";
                Ledger::insert([
                    'debit' => floatval($data[5]),
                    'credit' => 0,
                    'account_id' => \App\Account::where('code', $data[4])->first()->id,
                    'transaction_id' => $t_id
                ]);
                // if credit
            } elseif ($data[6]) {
                echo "C";
                Ledger::insert([
                    'debit' => 0,
                    'credit' => floatval($data[6]),
                    'account_id' => \App\Account::where('code', $data[4])->first()->id,
                    'transaction_id' => $t_id
                ]);
            }
            $counter += 1;
        }

//        // Monthly
//        Ledger::insert([
//            'debit' => 50000,
//            'credit' => 0,
//            'account_id' => \App\Account::where('code', '420')->first()->id,
//            'transaction_id' => 30
//        ]);
//
//        Ledger::insert([
//            'debit' => 0,
//            'credit' => 50000,
//            'account_id' => \App\Account::where('code', '710')->first()->id,
//            'transaction_id' => 30
//        ]);
//
//        Ledger::insert([
//        'debit' => 60000,
//        'credit' => 0,
//        'account_id' => \App\Account::where('code', '420')->first()->id,
//        'transaction_id' => 30
//    ]);
//
//        Ledger::insert([
//            'debit' => 0,
//            'credit' => 60000,
//            'account_id' => \App\Account::where('code', '710')->first()->id,
//            'transaction_id' => 30
//        ]);
//
//        Ledger::insert([
//            'debit' => 10000,
//            'credit' => 0,
//            'account_id' => \App\Account::where('code', '840')->first()->id,
//            'transaction_id' => 30
//        ]);
//
//        Ledger::insert([
//            'debit' => 0,
//            'credit' => 10000,
//            'account_id' => \App\Account::where('code', '130')->first()->id,
//            'transaction_id' => 30
//        ]);
//
//        // Yearly
//        Ledger::insert([
//            'debit' => (double) 200,
//            'credit' => 0,
//            'account_id' => \App\Account::where('code', '880')->first()->id,
//            'transaction_id' => 50
//        ]);
//        Ledger::insert([
//            'debit' => 0,
//            'credit' => 200,
//            'account_id' => \App\Account::where('code', '215')->first()->id,
//            'transaction_id' => 50
//        ]);
//
//        Ledger::insert([
//            'debit' => 300,
//            'credit' => 0,
//            'account_id' => \App\Account::where('code', '880')->first()->id,
//            'transaction_id' => 50
//        ]);
//
//        Ledger::insert([
//            'debit' => 0,
//            'credit' => 300,
//            'account_id' => \App\Account::where('code', '225')->first()->id,
//            'transaction_id' => 50
//        ]);
//
//        Ledger::insert([
//            'debit' => 100,
//            'credit' => 0,
//            'account_id' => \App\Account::where('code', '880')->first()->id,
//            'transaction_id' => 50
//        ]);
//        Ledger::insert([
//            'debit' => 0,
//            'credit' => 100,
//            'account_id' => \App\Account::where('code', '235')->first()->id,
//            'transaction_id' => 50
//        ]);

    }

}
