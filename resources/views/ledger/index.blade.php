@extends('layouts.app')

@section('styles')
    <style>
        .row {
            margin-bottom: 1.7%;
        }

        table tr td:last-child, td:nth-last-child(2) {
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
            <div class="row">
                <form action="" method="get" class="col-xs-4 pull-right">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit"  id="search-btn" class="btn btn-flat"><i
                                        class="fa fa-search"></i>
                            </button>
                         </span>
                    </div>
                </form>
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
                    @foreach($transactions as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->created_at }} </td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->debit == 0 ?  '' : number_format($item->debit) }}</td>
                            <td>{{ number_format($item->credit) == 0 ? '': number_format($item->credit) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pull-right">
                {{ $transactions->appends(['q' => $q])->links() }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {{--<script>--}}
    {{--$(document).ready(function(){--}}
    {{--$('#data-table').DataTable();--}}
    {{--});--}}
    {{--</script>--}}
@endsection