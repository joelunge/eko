@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Åtegärd krävs ({{count($transactionsActionRequired)}})</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Godkända ({{count($transactionsApproved)}})</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Alla ({{count($transactionsAll)}})</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="action-required-tab">
                <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">Datum</th>
                  <th scope="col">Transaktion</th>
                  <th scope="col">Belopp</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($transactionsActionRequired as $transaction) 
                    <tr>
                    <td>{{$transaction->datum}}</td>
                    <td>{{$transaction->transaktion}}</td>
                    <td>{{$transaction->belopp}}</td>
                    </tr>
                    @endforeach
              </tbody>
            </table>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="approved-tab">
                <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">Datum</th>
                  <th scope="col">Transaktion</th>
                  <th scope="col">Belopp</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($transactionsApproved as $transaction) 
                    <tr>
                    <td>{{$transaction->datum}}</td>
                    <td>{{$transaction->transaktion}}</td>
                    <td>{{$transaction->belopp}}</td>
                    </tr>
                    @endforeach
              </tbody>
            </table>
              </div>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="all-tab">
                <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">Datum</th>
                  <th scope="col">Transaktion</th>
                  <th scope="col">Belopp</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($transactionsAll as $transaction) 
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
            
        </div>
    </div>
</div>
@endsection
