@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">Datum</th>
                  <th scope="col">Transaktion</th>
                  <th scope="col">Belopp</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->datum }}</td>
                        <td>{{ $transaction->transaktion }}</td>
                        <td>{{ $transaction->belopp }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
