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

    }

}
