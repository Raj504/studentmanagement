@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">Payment Page</div>
    <div class="card-body">
        <div class="card-body">
            <h5 class="card-title">Enrollment No : {{$items->enrollment->enroll_no}}</h5>
            <p class="card-text">Paid Date : {{$items->paid_date}}</p>
            <p class="card-text">Amount : {{$items->amount}}</p>
        </div>
    </hr>
    </div>
</div>
@endsection