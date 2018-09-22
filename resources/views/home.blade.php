@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Alla ({{count($transactionsAll)}})</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Åtegärd krävs ({{count($transactionsActionRequired)}})</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Godkända ({{count($transactionsApproved)}})</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="all-tab">
                <table class="table table-sm table-dark">
              <thead>
                <tr>
                  <th>
                  <th scope="col">Datum</th>
                  <th scope="col">Action</th>
                  <th scope="col">Transaktion</th>
                  <th scope="col">Belopp</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($transactionsAll as $transaction) 
                    <tr>
                    <td>@if ($transaction->approved === 1) <i class="text-success far fa-check-circle"></i> @elseif ($transaction->approved === 0) <i class="text-danger far fa-times-circle"></i> @endif</td>
                    <td>{{$transaction->datum}}</td>
                    <td><a class="btn btn-success btn-sm" href="/approve/{{$transaction->id}}">Approve</a> <a class="btn btn-danger btn-sm" href="/action_required/{{$transaction->id}}">Action required</a></td>
                    <td>{{$transaction->transaktion}}</td>
                    <td>{{$transaction->belopp}}</td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
              </div>
              <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="action-required-tab">
                <table class="table table-sm table-dark">
              <thead>
                <tr>
                  <th></th>
                  <th scope="col">Datum</th>
                  <th scope="col">Action</th>
                  <th scope="col">Transaktion</th>
                  <th scope="col">Belopp</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($transactionsActionRequired as $transaction) 
                    <tr>
                    <td><i class="text-danger far fa-times-circle"></i></td>
                    <td>{{$transaction->datum}}</td>
                    <td><a class="btn btn-success btn-sm" href="/approve/{{$transaction->id}}">Approve</a> <a class="btn btn-danger btn-sm" href="/action_required/{{$transaction->id}}">Action required</a></td>
                    <td>{{$transaction->transaktion}}</td>
                    <td>{{$transaction->belopp}}</td>
                    </tr>
                    @endforeach
              </tbody>
            </table>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="approved-tab">
                <table class="table table-sm table-dark">
              <thead>
                <tr>
                  <th></th>
                  <th scope="col">Datum</th>
                  <th scope="col">Action</th>
                  <th scope="col">Transaktion</th>
                  <th scope="col">Belopp</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($transactionsApproved as $transaction) 
                    <tr>
                    <td><i class="text-success far fa-check-circle"></i></td>
                    <td>{{$transaction->datum}}</td>
                    <td><a class="btn btn-success btn-sm" href="/approve/{{$transaction->id}}">Approve</a> <a class="btn btn-danger btn-sm" href="/action_required/{{$transaction->id}}">Action required</a></td>
                    <td>{{$transaction->transaktion}}</td>
                    <td>{{$transaction->belopp}}</td>
                    </tr>
                    @endforeach
              </tbody>
            </table>
              </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
