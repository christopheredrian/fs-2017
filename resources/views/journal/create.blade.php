@extends('layouts.app')

@section('styles')
    <style>

    </style>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h1>Add New Journal Entry</h1>
        </div>
        <div class="box-body">
            <form action="{{ route('journals.store')}}" method="post">
                {{ csrf_field() }}
                <h3>Date: {{ \Carbon\Carbon::now() }}</h3>
                <div id="debit">
                    <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-4">
                            <select name="debit_account[1]" id="">
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}( {{ $account->code }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-2"></div>
                        <div class="col-xs-2">
                            <input name="debit[1]" type="text">
                        </div>
                    </div>
                </div>
                <span id="add-debit" class="btn btn-success btn-xs">Add another field + </span>
                <div id="credit">
                    <div class="row">
                        <div class="col-xs-2"></div>
                        <div class="col-xs-4">
                            <select name="credit_account[1]" id="">
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}( {{ $account->code }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-3"></div>

                        <div class="col-xs-2">
                            <input name="credit[1]" type="text">
                        </div>
                    </div>
                </div>
                <span id="add-credit" class="btn btn-success btn-xs">Add another field + </span>
                <div>
                    <p>
                        <button type="submit" class="btn btn-success pull-right">Submit</button>
                    </p>
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