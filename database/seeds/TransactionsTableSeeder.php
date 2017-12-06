<?php

use Illuminate\Database\Seeder;
use App\Transaction;
use Carbon\Carbon;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = [];
        $current_date = Carbon::now();
        $current_date->addDays(-30);
        for ($i = 1; $i < 25; $i++) {
            echo $current_date . "\n";
            $transactions[] = ['id' => $i, 'created_at' => $current_date];
            Transaction::insert(['id' => $i, 'created_at' => $current_date]);
            $current_date = $current_date->addDay(1);
        }
    }
}
