@extends('layouts.app')

@section('content')

    <div class="box">
        <div class="box-header">
            <h1>Create new Account</h1>
        </div>
        <div class="box-body">

            <form class="form-horizontal"  action="{{ route('accounts.update', $account->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Account Name</label>
                        <div class="col-sm-10">
                            <input required value="{{ $account->name }}" name="name" type="text" class="form-control" id="name" placeholder="Account Name..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="code" class="col-sm-2 control-label">Code</label>
                        <div class="col-sm-10">
                            <input required value="{{ $account->code }}" name="code" type="text" class="form-control" id="code" placeholder="i.e 301" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-10">
                            <select required class="form-control" name="type" id="type">
                                <option {{ $account->type === 'B+' ? 'selected' : '' }} value="B+">Asset</option>
                                <option {{ $account->type === 'B-' ? 'selected' : '' }} value="B-">Liability</option>
                                <option {{ $account->type === 'C+' ? 'selected' : '' }} value="C+">Capital</option>
                                <option {{ $account->type === 'C-' ? 'selected' : '' }} value="C-">Withdrawal</option>
                                <option {{ $account->type === 'I+' ? 'selected' : '' }}  value="I+">Income</option>
                                <option {{ $account->type === 'I-' ? 'selected' : '' }} value="I-">Expense</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('accounts.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-warning pull-right">Save</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>

@endsection