@extends('layouts.app')

@section('content')

    <div class="box">
        <div class="box-header">
            <h1>Create new Account</h1>
        </div>
        <div class="box-body">

            <form class="form-horizontal"  action="{{ url('/accounts') }}" method="post">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Account Name</label>
                        <div class="col-sm-10">
                            <input required name="name" type="text" class="form-control" id="name" placeholder="Account Name..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="code" class="col-sm-2 control-label">Code</label>
                        <div class="col-sm-10">
                            <input required name="code" type="text" class="form-control" id="code" placeholder="i.e 301" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-10">
                            <select required class="form-control" name="type" id="type">
                                <option value="B+">Balance Sheet (+)</option>
                                <option value="B-">Balance Sheet (-)</option>
                                <option value="I+">Income Statement (+)</option>
                                <option value="I-">Income Statement(-)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('accounts.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-success pull-right">Create</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>

@endsection