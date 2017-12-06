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
                'type' => 'Current Assets'
            ],
            [
                'id' => 2,
                'code' => '260',
                'name' => 'Land',
                'type' => 'Property, Plant and Equipment'
            ],
            [
                'id' => 3,
                'code' => '270',
                'name' => 'Equipment',
                'type' => 'Property, Plant and Equipment'
            ],
            [
                'id' => 4,
                'code' => '110',
                'name' => 'Accounts Receivable',
                'type' => 'Current Assets'
            ],
            [
                'id' => 5,
                'code' => '300',
                'name' => 'Accounts Payable',
                'type' => 'Current Liabilities'
            ],
            [
                'id' => 6,
                'code' => '400',
                'name' => 'Sales',
                'type' => 'Income'
            ],
            [
                'id' => 7,
                'code' => '401',
                'name' => 'Sales Discount',
                'type' => 'Income'
            ],
            [
                'id' => 8,
                'code' => '420',
                'name' => 'Taxes and Licenses Expense',
                'type' => 'Expenses'
            ],
            [
                'id' => 9,
                'code' => '200',
                'name' => 'Investment BPI',
                'type' => 'Investment'
            ],
            [
                'id' => 10,
                'code' => '250',
                'name' => 'Trademark',
                'type' => 'Intellectual Property'
            ],
            [
                'id' => 11,
                'code' => '320',
                'name' => 'Mortgage Payable',
                'type' => 'Long-Term Liabilities'
            ],
            [
                'id' => 12,
                'code' => '350',
                'name' => 'Capital, Ila Liag',
                'type' => 'Capital'
            ],
            [
                'id' => 13,
                'code' => '351',
                'name' => 'Withdrawal, Ila Liag',
                'type' => 'Drawing'
            ],



        ];

        Account::insert($accounts);
    }
}
