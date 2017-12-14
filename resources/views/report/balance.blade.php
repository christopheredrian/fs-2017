@extends('layouts.app')

@section('styles')
    <style>
        .borderless td, .borderless th {
            border: none;
        }

        table tr td:nth-child(4){
            text-align: right;
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
                @foreach($ca as $item)
                    @if(($item->ledgers->sum('debit') - ($item->ledgers->sum('credit'))) >= 0 )
                    <tr>
                        <td> {{ $item->code }}</td>
                        <td> {{ $item->type }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ ($item->ledgers->sum('debit') - ($item->ledgers->sum('credit'))) }} </td>
                    </tr>
                    @endif
                @endforeach()
                @foreach($ca as $item)
                    @if(($item->ledgers->sum('debit') - ($item->ledgers->sum('credit'))) < 0 )
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td> Less: {{ $item->name }}</td>
                            <td>{{ ($item->ledgers->sum('debit') - ($item->ledgers->sum('credit'))) }} </td>
                        </tr>
                    @endif
                @endforeach()
                {{-- Non-Current Assets--}}
                <tr>
                    <td></td>
                    <td></td>
                    <td>Non-current Assets</td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach($ppe as $item)
                    @if(($item->ledgers->sum('debit') - ($item->ledgers->sum('credit'))) > 0 )
                        <tr>
                            <td> {{ $item->code }}</td>
                            <td> {{ $item->type }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ ($item->ledgers->sum('debit') - ($item->ledgers->sum('credit'))) }} </td>
                        </tr>
                    @endif
                @endforeach()
                @foreach($ppe as $item)
                    @if(($item->ledgers->sum('debit') - ($item->ledgers->sum('credit'))) <= 0 )
                        <tr>
                            <td> {{ $item->code }}</td>
                            <td> {{ $item->type }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ ($item->ledgers->sum('debit') - ($item->ledgers->sum('credit'))) }} </td>
                        </tr>
                    @endif
                @endforeach()

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-bottom: 1.2px double black; !important;">
                        {{ '0' }}
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

