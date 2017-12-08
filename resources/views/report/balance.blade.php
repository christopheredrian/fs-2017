@extends('layouts.app')

@section('styles')
    <style>
        .borderless td, .borderless th {
            border: none;
        }

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
            <h2 class="text-center">
                Baguio City Hall <br>
                Balance Sheet<br>
                as of {{ \Carbon\Carbon::now()->toFormattedDateString() }}
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
                    {{--<th>Type</th>--}}
                    {{--<th>Account</th>--}}
                    {{--<th>Total</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                <tbody>
                {{-- Assets --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-center">Assets</td>
                    <td></td>
                    <td></td>
                </tr>
                {{-- Current Assets--}}
                <tr>
                    <td></td>
                    <td></td>
                    <td>Current Assets</td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach(\App\Account::where('type', 'Current Assets')->get() as $ca)
                    <tr>
                        <td>{{ $ca->code }}</td>
                        <td>{{ $ca->type }}</td>
                        <td>{{ $ca->name }}</td>
                        <td>{{ ($ca->ledgers->sum('debit') - $ca->ledgers->sum('credit')) }}</td>
                    </tr>
                @endforeach()
                {{-- Non-Current Assets--}}
                <tr>
                    <td></td>
                    <td></td>
                    <td>Non-current Assets</td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach(\App\Account::where('type', 'Non-current Assets')->get() as $ca)
                    <tr>
                        <td>{{ $ca->code }}</td>
                        <td>{{ $ca->type }}</td>
                        <td>{{ $ca->name }}</td>
                        <td>{{ ($ca->ledgers->sum('debit') - $ca->ledgers->sum('credit')) }}</td>
                    </tr>
                @endforeach()
                {{--@foreach(\App\Account::where('type', 'Intellectual Property')->get() as $ca)--}}
                    {{--<tr>--}}
                        {{--<td>{{ $ca->code }}</td>--}}
                        {{--<td>{{ $ca->type }}</td>--}}
                        {{--<td>{{ $ca->name }}</td>--}}
                        {{--<td>{{ ($ca->ledgers->sum('debit') - $ca->ledgers->sum('credit')) }}</td>--}}
                    {{--</tr>--}}
                {{--@endforeach()--}}
                {{--Property, Plant and Equipment--}}
                {{--@foreach(\App\Account::where('type', 'Property, Plant and Equipment')->get() as $ca)--}}
                    {{--<tr>--}}
                        {{--<td>{{ $ca->code }}</td>--}}
                        {{--<td>{{ $ca->type }}</td>--}}
                        {{--<td>{{ $ca->name }}</td>--}}
                        {{--<td>{{ ($ca->ledgers->sum('debit') - $ca->ledgers->sum('credit')) > 0 ? $ca->ledgers->sum('debit') : '' }}</td>--}}
                    {{--</tr>--}}
                {{--@endforeach()--}}
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total Assets</td>
                    <td style="border-bottom: 1.2px double black; !important;">
                        <?php

                        $types = ['Current Assets', 'Non-current Assets'];
                        $ids = \App\Account::whereIn('type', $types)->pluck('id');
                        $sumDebit = \App\Ledger::whereIn('account_id', $ids)->sum('debit');
                        $sumCredit = \App\Ledger::whereIn('account_id', $ids)->sum('credit');
                        echo $sumDebit - $sumCredit;
                        ?>
                    </td>
                </tr>
                {{-- Liabilities --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-center">Liabilities and Capital</td>
                    <td></td>
                </tr>
                {{-- Current Liabilities --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td>Current Liabilities</td>
                    <td></td>
                </tr>
                @foreach(\App\Account::where('type', 'Current Liabilities')->get() as $ca)
                    <tr>
                        <td>{{ $ca->code }}</td>
                        <td>{{ $ca->type }}</td>
                        <td>{{ $ca->name }}</td>
                        @if(str_contains($ca->name, 'Service'))
                            <td>{{ 0  }}</td>
                        @else
                            <td>{{ ( $ca->ledgers->sum('credit')) - $ca->ledgers->sum('debit')  }}</td>
                        @endif
                    </tr>
                @endforeach()
                {{-- Long term Liabilities --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-center">Long Term Liabilities</td>
                    <td></td>
                </tr>
                @foreach(\App\Account::where('type', 'Non-Current Liabilities')->get() as $ca)
                    <tr>
                        <td>{{ $ca->code }}</td>
                        <td>{{ $ca->type }}</td>
                        <td>{{ $ca->name }}</td>
                        <td>{{ ( $ca->ledgers->sum('credit')) - $ca->ledgers->sum('debit')  }}</td>
                    </tr>
                @endforeach()
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total Liabilities</td>
                    <td style="border-bottom: 1.2px double black; !important;">
                        <?php

                        $types = ['Current Liabilities', 'Non-Current Liabilities'];
                        $ids = \App\Account::whereIn('type', $types)->pluck('id');
                        $sumDebit = \App\Ledger::whereIn('account_id', $ids)->sum('debit');
                        $sumCredit = \App\Ledger::whereIn('account_id', $ids)->sum('credit');
                        $totalLiab = $sumCredit - $sumDebit;
                        $unearnedServiceIncome =  \App\Ledger::where('account_id',[11] )->sum('credit');

                        echo  $totalLiab - $unearnedServiceIncome;
                        ?>
                    </td>
                </tr>
                {{-- Capital--}}
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-center">Capital</td>
                    <td></td>
                </tr>
                @foreach(\App\Account::where('type', 'Capital')->get() as $ca)
                    <tr>
                        <td>{{ $ca->code }}</td>
                        <td>{{ $ca->type }}</td>
                        <td>{{ $ca->name }}</td>
                        <td>
                            <?php
                                $capital = ( $ca->ledgers->sum('credit')) - $ca->ledgers->sum('debit');
                                echo $capital;
                            ?>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td>Add: Net Income</td>
                    <td style="border-bottom: 1.2px double black; !important;">
                        <!--                        --><?php
                        $types = ['Expenses'];
                        $ids = \App\Account::whereIn('type', $types)->pluck('id');
                        $sumDebitExpenses = \App\Ledger::whereIn('account_id', $ids)->sum('debit');
                        $sumCreditExpenses = \App\Ledger::whereIn('account_id', $ids)->sum('credit');
                        $sumExpenses = $sumDebitExpenses - $sumCreditExpenses;

                        $types = ['Income'];
                        $ids = \App\Account::whereIn('type', $types)->pluck('id');
                        $sumDebitIncome = \App\Ledger::whereIn('account_id', $ids)->sum('debit');
                        $sumCreditIncome = \App\Ledger::whereIn('account_id', $ids)->sum('credit');
                        $sumIncome = $sumCreditIncome;


                        $unearnedServiceIncome =  \App\Ledger::where('account_id',[11] )->sum('credit');
                        $netIncome = ($sumCreditIncome + $unearnedServiceIncome) - $sumExpenses;
                        echo $netIncome;
                        ?>
                    </td>
                </tr>
                @foreach(\App\Account::where('type', 'Drawing')->get() as $ca)
                    <tr>
                        <td>{{ $ca->code }}</td>
                        <td>{{ $ca->type }}</td>
                        <td>Less: {{ $ca->name }}</td>
                        <td>
                            <?php
                            $drawing = ($ca->ledgers->sum('debit') - $ca->ledgers->sum('credit'));
                            echo $drawing;
                            ?>
                        </td>
                    </tr>
                @endforeach()
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-bottom: 1.2px double black; !important;">
                        {{ $totalLiab + $capital - $drawing + $netIncome }}
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

