@extends('layouts.app')

@section('styles')
    <style>
        @media print {
            footer, button.btn-danger {
                display: none;
            }
        }

        table tr td:last-child, td:nth-last-child(2){
            text-align: right;
        }
    </style>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h2 class="text-center">Psalmist Music Center <br>
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

                <tbody>
                @foreach(\App\Account::where('type', 'Inc')->get() as $ca)
                    <tr>
                        <td>{{ $ca->code }}</td>
                        <td>{{ $ca->name }}</td>
                        <td></td>
                        {{--@if(str_contains($ca->name, 'Service'))--}}
                            {{--<td>{{ \App\Ledger::whereIn('account_id',[15] )->sum('credit')  }}</td>--}}
                        {{--@else--}}
                            <td>{{ $ca->ledgers->sum('credit') - $ca->ledgers->sum('debit') }}</td>
                        {{--@endif--}}
                    </tr>
                @endforeach

                <tr>
                    <td></td>
                    <td>Less: Expenses</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php $expensesTotal = 0; ?>
                @foreach(\App\Account::where('type', 'Expenses')->get() as $ca)
                    <?php $expensesTotal += ($ca->ledgers->sum('debit'))?>
                    <tr>
                        <td>{{ $ca->code }}</td>
                        <td>{{ $ca->name }}</td>
                        <td>{{ $ca->ledgers->sum('debit') - $ca->ledgers->sum('credit') }}</td>
                        <td></td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td>Net Income/ (Loss)</td>
                    <td></td>
                    <td style="border-bottom: 1.2px double black; !important;">
                      {{ $income - $expenses }}
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

