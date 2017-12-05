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
                            <input name="name" value="{{ $account->name }}" type="text" class="form-control" id="name" placeholder="Account Name..." required>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-success pull-right">Create</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>

@endsection