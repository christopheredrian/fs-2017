@extends('layouts.app')

@section('styles')
    <style>
        @media print {
            footer, button.btn-danger{
                display: none;
            }
        }
    </style>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h2 class="text-center">Baguio City Hall <br>
                Income Statement <br>
                For the period of {{ $start }} to {{ $end }}
            </h2>
            <div class="col-xs-12">
                <button class="btn btn-danger btn-md pull-right" onclick="window.print()">
                    <i class="fa fa-print"> Print</i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-hover">
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th>Code</th>--}}
                    {{--<th>Account</th>--}}
                    {{--<th></th>--}}
                    {{--<th></th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                <tbody>
                @foreach(\App\Account::where('type', 'Income')->get() as $ca)
                    <tr>
                        <td>{{ $ca->code }}</td>
                        <td>{{ $ca->name }}</td>
                        <td></td>
                        <td>{{ $ca->ledgers->sum('debit') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td>Net Income:</td>
                    <td></td>
                    <td style="border-bottom: 1.2px double black; !important;">
                        <?php
                        $types = ['Income'];
                        $ids = \App\Account::whereIn('type', $types)->pluck('id');
                        $sumDebit = \App\Ledger::whereIn('account_id', $ids)->sum('debit');
                        echo $sumDebit;
                        ?>
                    </td>
                </tr>
                @foreach(\App\Account::where('type', 'Income')->get() as $ca)
                    <tr>
                        <td>{{ $ca->code }}</td>
                        <td>Less: {{ $ca->name }}</td>
                        <td>{{ $ca->ledgers->sum('credit') }}</td>
                        <td></td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td>Gross Income:</td>
                    <td></td>
                    <td style="border-bottom: 1.2px double black; !important;">
                        <?php
                        $types = ['Income'];
                        $ids = \App\Account::whereIn('type', $types)->pluck('id');
                        $sumDebit = \App\Ledger::whereIn('account_id', $ids)->sum('debit');
                        $sumCredit = \App\Ledger::whereIn('account_id', $ids)->sum('credit');
                        $sumIncome = $sumDebit - $sumCredit;
                        echo $sumIncome;
                        ?>
                    </td>
                </tr>
                {{-- Expenses --}}
                <tr>
                    <td></td>
                    <td>Less: Expenses</td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach(\App\Account::where('type', 'Expenses')->get() as $ca)
                    <tr>
                        <td>{{ $ca->code }}</td>
                        <td>{{ $ca->name }}</td>
                        <td></td>
                        <td>{{ $ca->ledgers->sum('debit') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td>Net Income/ (Loss)</td>
                    <td></td>
                    <td style="border-bottom: 1.2px double black; !important;">
                        <?php
                        $types = ['Expenses'];
                        $ids = \App\Account::whereIn('type', $types)->pluck('id');
                        $sumDebitExpenses = \App\Ledger::whereIn('account_id', $ids)->sum('debit');
                        $sumCreditExpenses = \App\Ledger::whereIn('account_id', $ids)->sum('credit');
                        $sumExpenses = $sumDebitExpenses - $sumCreditExpenses;
                        echo $sumIncome - $sumExpenses;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-bottom: 1.2px double black; !important;">
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection

