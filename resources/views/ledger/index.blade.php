@extends('layouts.app')

@section('styles')
    <style>
        .row {
            margin-bottom: 1.7%;
        }

        table tr td:last-child, td:nth-last-child(2){
            text-align: right;
        }
    </style>
@endsection

@section('content')

    <div class="box">
        <div class="box-header page-header">
            <h1>Ledger</h1>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <a class="btn btn-success" href="{{ route('journals.create')}}">Post new entry</a>
                </div>
            </div>
            <table id="data-table" class="table table-striped table-condensed table-bordered table-responsive">
                <thead>
                <tr>
                    <th>Transaction #</th>
                    <th>Date</th>
                    <th>Code</th>
                    <th>Account</th>
                    <th>Debit</th>
                    <th>Credit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transactions as $transaction)
                    @foreach($transaction->ledgers as $ledger)
                        <tr>
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $transaction->created_at->toDateString() }}
                            </td>
                            <td>{{ $ledger->account->code }}</td>
                            <td>{{ $ledger->account->name }}</td>
                            <td>{{ number_format($ledger->debit) == 0 ?  '' : number_format($ledger->debit) }}</td>
                            <td>{{ number_format($ledger->credit) == 0 ? '': number_format($ledger->credit) }}</td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#data-table').DataTable();
        });
    </script>
@endsection