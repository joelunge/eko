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
        </div>
    </div>
</div>
@endsection
