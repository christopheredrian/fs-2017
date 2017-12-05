@extends('layouts.app')

@section('styles')
    <style>
        .row {
            margin-bottom: 1.7%;
        }
    </style>
@endsection

@section('content')

    <div class="box">
        <div class="box-header page-header">
            <h1>Chart of Accounts</h1>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <a class="btn btn-success" href="{{ url('/accounts/create') }}">Create</a>
                </div>
            </div>
            <table id="data-table" class="table table-striped table-condensed table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Account Name</th>
                    <th>Code</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($accounts as $account)
                    <tr>
                        <td>{{ $account->id }}</td>
                        <td>{{ $account->name }}</td>
                        <td>{{ $account->code }}</td>
                        <td>{{ $account->type }}</td>
                        <td><a href="{{ url("/accounts/$account->id/edit") }}" class="btn btn-warning btn-xs">Edit</a></td>
                    </tr>
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