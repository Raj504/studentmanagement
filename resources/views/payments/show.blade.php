@extends('layout')
@section('content')

<style>
    /* Card styles */
    .card {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: none;
        background-color: #ffffff;
        margin: 20px;
    }

    .card-header {
        background-color: #007bff;
        color: #ffffff;
        padding: 15px;
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .card-body {
        padding: 20px;
        background-color: #f8f9fa;
    }

    .card-title {
        font-size: 1.25rem;
        color: #343a40;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 1.1rem;
        color: #495057;
        margin-bottom: 15px;
    }

    .card-text span {
        font-weight: bold;
        color: #007bff;
    }

    /* Back button styles */
    .btn-back {
        background-color: #6c757d;
        color: #ffffff;
        border-radius: 8px;
        padding: 10px 20px;
        text-decoration: none;
        display: inline-block;
        margin-top: 20px;
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #5a6268;
        color: #ffffff;
        text-decoration: none;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .card-header {
            font-size: 1.2rem;
        }

        .card-title {
            font-size: 1.1rem;
        }

        .card-text {
            font-size: 1rem;
        }

        .btn-back {
            padding: 8px 16px;
            font-size: 0.9rem;
        }
    }
</style>

<div class="card">
    <div class="card-header">Payment Page</div>
    <div class="card-body">
        <h5 class="card-title">Enrollment No: <span>{{ $payment->enrollment->enroll_no }}</span></h5>
        <p class="card-text">Paid Date: <span>{{ $payment->paid_date }}</span></p>
        <p class="card-text">Amount: <span>{{ $payment->amount }}</span></p>
        
        <!-- Back Button -->
        <a href="{{ url()->previous() }}" class="btn-back">Back</a>
    </div>
</div>

@endsection
