<?php

use Illuminate\Database\Seeder;
use App\Account;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [
            [
                'id' => 1,
                'code' => '100',
                'name' => 'Cash',
                'type' => 'B+'
            ],
            [
                'id' => 2,
                'code' => '101',
                'name' => 'Land',
                'type' => 'B+'
            ],
            [
                'id' => 3,
                'code' => '102',
                'name' => 'Equipment',
                'type' => 'B+'
            ],
            [
                'id' => 4,
                'code' => '103',
                'name' => 'Accounts Receivable',
                'type' => 'B+'
            ],
            [
                'id' => 5,
                'code' => '300',
                'name' => 'Accounts Payable',
                'type' => 'B-'
            ],
            [
                'id' => 6,
                'code' => '400',
                'name' => 'Sales',
                'type' => 'I+'
            ],
            [
                'id' => 7,
                'code' => '401',
                'name' => 'Sales Discount',
                'type' => 'I-'
            ],
            [
                'id' => 8,
                'code' => '500',
                'name' => 'Rent Expense',
                'type' => 'I-'
            ],

        ];

        Account::insert($accounts);
    }
}
