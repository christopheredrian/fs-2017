@extends('layouts.app')

@section('styles')
    <style>
        p.text-danger{
            font-size: 0.8em;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header page-header">
                    <h1>Dashboard <i class="fa fa-dashboard"></i></h1>
                    <p class="text-danger"><strong>NOTE: </strong>For the <strong>Documentation about this
                            project</strong> <a href="/about">please click this
                            link.</a></p>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-xs-11">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-7">

                            <div class="row">
                                <h2 class="page-header">Recent Transactions</h2>
                                <table class="table table-bordered">
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
                                    @foreach(\App\Transaction::orderBy('created_at', 'desc')->limit(3)->get() as $transaction)
                                        @foreach($transaction->ledgers as $ledger)
                                            <tr>
                                                <td>{{ $transaction->id }}</td>
                                                <td>{{ $transaction->created_at->toDateString() }}
                                                    ({{ $transaction->created_at->toTimeString() }})
                                                </td>
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
                        <div class="col-md-3">

                            <div style="margin-top: 40%">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>{{ \App\Transaction::count() }}</h3>
                                        <p>Total Transactions</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-list"></i>
                                    </div>
                                    <a href="/ledgers" class="small-box-footer">More info <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div>
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>{{ \App\Ledger::count() }}</h3>
                                        <p>Total Ledger Row Count</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-bar-chart"></i>
                                    </div>
                                    <a href="/ledgers" class="small-box-footer">More info <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
