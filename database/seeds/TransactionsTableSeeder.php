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
        $current_date->year = 2016;
        $current_date->month = 2;
        $current_date->addDays(-30);
        $dates = [1, 2, 3, 4, 5, 8, 9, 10, 15, 16, 20, 22, 23, 25, 26, 27, 28, 29, 30];
        foreach ($dates as $i) {
            echo $current_date . "\n";
            $current_date->day = $i;
            $transactions[] = ['id' => $i , 'created_at' => $current_date];
            Transaction::insert(['id' => $i, 'created_at' => $current_date]);
        }

        // Yearly
        $current_date->year = 2017;
        $current_date->month = 1;
        $current_date->day = 1;
        Transaction::insert(['id' => 50, 'created_at' => $current_date]);


    }
}
