@extends('layouts.app')

@section('styles')
    <style>
        .borderless td, .borderless th {
            border: none;
        }

        table tr td:nth-child(4) {
            text-align: right;
        }

        @media print {
            footer, button.btn-danger {
                display: none;
            }
        }

    </style>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h2 class="text-center">
                Psalmist Music Center <br>
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
                    <td class="text-center"><strong>Assets</strong></td>
                    <td></td>
                    <td></td>
                </tr>
                {{-- Current Assets--}}
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Current Assets</strong></td>
                    <td></td>
                </tr>
                <?php
                $assets = 0;
                $liabilities_and_capital = 0;
                ?>
                @foreach(\App\Account::where('type', 'CA')->get() as $item)
                    <tr>
                        <?php
                        $ca = ($item->ledgers->sum('debit') - ($item->ledgers->sum('credit')));
                        $assets += $ca;
                        ?>
                        <td> {{ $item->code }}</td>
                        <td> {{ $item->type }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($ca)  }} </td>
                    </tr>
                @endforeach()

                {{-- Non-Current Assets--}}
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Non-current Assets</strong></td>
                    <td></td>
                </tr>
                @foreach(\App\Account::where('type', 'PPE')->get() as $item)
                    <tr>
                        <?php
                        $ppe = ($item->ledgers->sum('debit') - ($item->ledgers->sum('credit')));
                        $assets += $ppe;

                        ?>
                        <td> {{ $item->code }}</td>
                        <td> {{ $item->type }}</td>
                        <td>{{ $ppe < 0 ? 'Less: ': '' }}{{ $item->name }}</td>
                        <td>{{ number_format(abs($ppe)) }} </td>
                    </tr>
                @endforeach()
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Total Assets</strong></td>
                    <td style="border-bottom: 1.2px double black; !important;">
                        {{ number_format($assets) }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-bottom: 1.2px double black; !important;">
                    </td>
                </tr>
                {{-- Liabilities --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-center"><strong>Liabilities and Capital</strong></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Liabilities</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Current Liabilities</strong></td>
                    <td></td>
                </tr>
                @foreach(\App\Account::where('type', 'CL')->get() as $item)
                    <tr>
                        <?php
                        $liabilities = ($item->ledgers->sum('credit') - ($item->ledgers->sum('debit')));
                        $liabilities_and_capital += $liabilities;
                        ?>
                        <td> {{ $item->code }}</td>
                        <td> {{ $item->type }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($liabilities )}} </td>
                    </tr>
                @endforeach()

                {{-- Capital and Drawing --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-center"><strong>Capital</strong></td>
                    <td></td>
                </tr>
                @foreach(\App\Account::where('type', 'Cap')->get() as $item)
                    <tr>
                        <?php
                        $capital = ($item->ledgers->sum('credit') - ($item->ledgers->sum('debit')));
                        $liabilities_and_capital += $capital;
                        ?>
                        <td> {{ $item->code }}</td>
                        <td> {{ $item->type }}</td>
                        <td>{{ $capital < 0 ? 'Less: ': '' }}{{ $item->name }}</td>
                        <td>{{  number_format(abs($capital)) }} </td>
                    </tr>
                @endforeach()
                {{-- Net income --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td>Add: Net Income </td>
                    <td>{{ number_format($net) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Total Liabilities and Capital</strong></td>
                    <td style="border-bottom: 1.2px double black; !important;">
                        {{ number_format($liabilities_and_capital + $net) }}
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

