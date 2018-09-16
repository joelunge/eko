@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div style="margin-top: 50px;" class="col-md-8">
        	<div class="card">
			  <div class="card-body">
			    <h5 style="font-size: 24px;" class="card-title text-center">{{$transaction->transaktion}}</h5>
			    <p style="font-size: 18px;" class="card-text text-center">{{$transaction->datum}} {{date('l', strtotime($transaction->datum))}}</p>
			    <p style="font-size: 24px;" class="text-danger card-text text-center">{{str_replace(',00', '', $transaction->belopp)}} kr</p>
			    <div class="text-center">
			    	<a href="/approve/{{$transaction->id}}" class="btn btn-success btn-lg center-block">Godkänn</a><br /><br />
			    	<a href="/action_required/{{$transaction->id}}" class="btn btn-dark center-block">Åtgärd krävs</a>
				</div>
			  </div>
			</div>

			@foreach ($relatedTransactions as $word => $transactions)
				<br />
				<div class="card">
					<div class="card-body">
						<h5 style="font-size: 24px;" class="card-title text-center">{{$word}}</h5>
						<table class="table table-dark">
			              <tbody>
			                  @foreach ($transactions as $transaction) 
			                    <tr>
				                    <td>{{$transaction->datum}}</td>
				                    <td>{{$transaction->transaktion}}</td>
				                    <td>{{$transaction->belopp}}</td>
			                    </tr>
			                  @endforeach
			              </tbody>
			            </table>
					</div>
				</div>
			@endforeach
        </div>
    </div>
</div>
@endsection
