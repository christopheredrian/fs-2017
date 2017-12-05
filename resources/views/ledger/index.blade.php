@extends('layouts.app')

@section('content')

    <div class="box">
        <div class="box-header">
            <h1>Ledger</h1>
        </div>
        <div class="box-body">
            <a class="btn btn-success" href="{{ route('journals.create')}}">Create</a>
            <table class="table table-striped table-condensed table-bordered table-responsive">
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
                            <td>{{ $transaction->created_at->toDateString() }} ({{ $transaction->created_at->toTimeString() }})</td>
                            <td>{{ $ledger->account->code }}</td>
                            <td>{{ $ledger->account->name }}</td>
                            <td>{{ $ledger->debit == 0 ? '': $ledger->debit }}</td>
                            <td>{{ $ledger->credit == 0 ? '': $ledger->credit }}</td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection