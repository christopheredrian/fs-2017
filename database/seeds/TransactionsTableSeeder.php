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
        $dates = [1, 2, 3, 4, 5, 8, 9, 10, 15, 16, 20, 22, 23, 25, 26, 27, 28, 29, 30];
        foreach ($dates as $i) {
            echo $current_date . "\n";
            $transactions[] = ['id' => $i, 'created_at' => $current_date];
            Transaction::insert(['id' => $i, 'created_at' => $current_date]);
            $current_date = $current_date->addDay(1);
        }
    }
}
