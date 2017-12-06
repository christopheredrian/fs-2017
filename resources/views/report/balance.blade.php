@extends('layouts.app')

@section('content')

    <div class="box">
        <div class="box-header page-header">
            <h2 class="text-center">
                Baguio City Hall <br>
                Balance Sheet<br>
                as of {{ \Carbon\Carbon::now()->toFormattedDateString() }}
            </h2>

            <table class="table">
                <thead>
                   <tr>
                       <th>Code</th>
                       <th>Type</th>
                       <th>Account</th>
                       <th>Debit</th>
                       <th>Credit</th>
                       <th></th>
                   </tr>
                </thead>
                <tbody>
                    {{-- Assets --}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center">Assets</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    {{-- Current Assets--}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Current Assets</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    {{-- Non-Current Assets--}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Non-Current Assets</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    {{-- Liabilities --}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center">Liabilities</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    {{-- Current Liabilities --}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Current Liabilities</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    {{-- Long term Liabilities --}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Long Term Liabilities</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    {{-- Capital--}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center">Capital</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="box-body">

        </div>
    </div>

@endsection

