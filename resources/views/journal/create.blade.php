@extends('layouts.app')

@section('styles')
    <style>
        .row {
            margin: 1.6% 0;
        }

        .page-header h2 {
            display: inline;
        }
    </style>
@endsection

@section('content')

    <div class="box">
        <div class="box-header page-header">
            <h1>Add New Journal Entry</h1>
        </div>
        <div class="box-body">
            <form action="{{ route('journals.store')}}" method="post">
                {{ csrf_field() }}
                <div class="row page-header">
                    <h4 class="col-xs-5">{{ \Carbon\Carbon::now()->toDayDateTimeString() }}</h4>
                    <h4 class="col-xs-3">Debit</h4>
                    <h4 class="col-xs-3">Credit</h4>
                </div>
                <div id="debit">
                    <div class="row">
                        <div class="col-xs-4">
                            <select required class="form-control" name="debit_account[1]" id="">
                                <option value="">Please Select Account</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}({{ $account->code }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-1"></div>
                        <div class="col-xs-3">
                            <input required class="form-control" placeholder="Amount..." name="debit[1]" type="text">
                        </div>
                        <div class="col-xs-3"></div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-3">
                        <span id="add-debit" class="pull-right btn btn-success btn-xs">Add another field + </span>
                    </div>
                </div>
                <div id="credit">
                    <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-4">
                            <select required class="form-control" name="credit_account[1]" id="">
                                <option value="">Please Select Account</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}({{ $account->code }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-3"></div>

                        <div class="col-xs-3">
                            <input required class="form-control" placeholder="Amount..." name="credit[1]" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-3">
                        <span id="add-credit" class="btn btn-success btn-xs pull-right">Add another field + </span>
                    </div>
                </div>
                <div>
                    <button style="margin: 0 0 0 2.5%" type="submit" class="btn btn-success pull-right">Submit</button>
                    <button onclick="location.reload()" class="pull-right btn btn-warning">Clear</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            var debitCounter = 2;
            var creditCounter = 2;
            $('#add-debit').click(function () {
                var $cloned = $('#debit div.row').first().clone(true);
                $cloned.find('select').attr('name', 'debit_account[' + debitCounter + ']');
                $cloned.find('input').attr('name', 'debit[' + debitCounter + ']');
                $('#debit').append($cloned);
                debitCounter += 1;
            });
            $('#add-credit').click(function () {
                var $cloned = $('#credit div.row').first().clone(true);
                $cloned.find('select').attr('name', 'credit_account[' + creditCounter + ']');
                $cloned.find('input').attr('name', 'credit[' + creditCounter + ']');
                $('#credit').append($cloned);
                creditCounter += 1;
            });
        });
    </script>
@endsection