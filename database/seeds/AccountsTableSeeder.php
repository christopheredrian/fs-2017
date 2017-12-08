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
                'code' => '110',
                'name' => 'Cash',
                'type' => 'Current Assets'
            ],
            [
                'id' => 2,
                'code' => '120',
                'name' => 'Accounts Receivable',
                'type' => 'Current Assets'
            ],
            [
                'id' => 3,
                'code' => '130',
                'name' => 'Supplies',
                'type' => 'Current Assets'
            ],
            [
                'id' => 4,
                'code' => '210',
                'name' => 'Furniture',
                'type' => 'Non-current Assets'
            ],
            [
                'id' => 5,
                'code' => '215',
                'name' => 'Accumulated Depreciation - Furniture',
                'type' => 'Non-current Assets'
            ],
            [
                'id' => 6,
                'code' => '220',
                'name' => 'Musical Instruments',
                'type' => 'Non-current Assets'
            ],
            [
                'id' => 7,
                'code' => '225',
                'name' => 'Accumulated Depreciation - Musical Instruments',
                'type' => 'Contra-asset'
            ],
            [
                'id' => 8,
                'code' => '230',
                'name' => 'Office equipment',
                'type' => 'Current Assets'
            ],
            [
                'id' => 9,
                'code' => '235',
                'name' => 'Accumulated Depreciation - Office Equipment',
                'type' => 'Contra-asset'
            ],
            [
                'id' => 10,
                'code' => '410',
                'name' => 'Accounts Payable',
                'type' => 'Current Liabilities'
            ],
            [
                'id' => 11,
                'code' => '420',
                'name' => 'Unearned Service Income',
                'type' => 'Current Liabilities'
            ],
            [
                'id' => 12,
                'code' => '510',
                'name' => 'Notes Payable',
                'type' => 'Non-Current Liabilities'
            ],
            [
                'id' => 13,
                'code' => '610',
                'name' => 'Owner, Capital',
                'type' => 'Capital'
            ],
            [
                'id' => 14,
                'code' => '620',
                'name' => 'Owner, Drawing',
                'type' => 'Drawing'
            ],
            [
                'id' => 15,
                'code' => '710',
                'name' => 'Service Income',
                'type' => 'Income'
            ],
            [
                'id' => 16,
                'code' => '810',
                'name' => 'Rent Expense',
                'type' => 'Expenses'
            ],
            [
                'id' => 17,
                'code' => '820',
                'name' => 'Advertising Expense',
                'type' => 'Expenses'
            ],
            [
                'id' => 18,
                'code' => '830',
                'name' => 'Taxes and licenses',
                'type' => 'Expenses'
            ],
            [
                'id' => 19,
                'code' => '840',
                'name' => 'Supplies Expense',
                'type' => 'Expenses'
            ],
            [
                'id' => 20,
                'code' => '850',
                'name' => 'Utilities Expense',
                'type' => 'Expenses'
            ],
            [
                'id' => 21,
                'code' => '860',
                'name' => 'Salaries Expense',
                'type' => 'Expenses'
            ],
            [
                'id' => 22,
                'code' => '870',
                'name' => 'Communication Expense',
                'type' => 'Expenses'
            ],
            [
                'id' => 23,
                'code' => '880',
                'name' => 'Depreciation Expense',
                'type' => 'Expenses'
            ],



        ];

        Account::insert($accounts);
    }
}
