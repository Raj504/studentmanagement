@extends('layout')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white text-center">
        <h3 class="mb-0">Batch Details</h3>
    </div>
    <div class="card-body bg-light">
        <div class="mb-4">
            <h5 class="card-title text-primary font-weight-bold">Name:</h5>
            <p class="card-text">{{ $batches->name }}</p>
        </div>
        <div class="mb-4">
            <h5 class="card-title text-primary font-weight-bold">Course:</h5>
            <p class="card-text">{{ $batches->course->name }}</p>
        </div>
        <div class="mb-4">
            <h5 class="card-title text-primary font-weight-bold">Start Date:</h5>
            <p class="card-text">{{ \Carbon\Carbon::parse($batches->start_date)->format('d-M-Y') }}</p>
        </div>
        <div class="text-center">
            <a href="{{ route('batches.index') }}" class="btn btn-secondary rounded-pill px-4">Back</a>
        </div>
    </div>
</div>

<style>
    .card-header {
        font-size: 1.5rem;
        font-weight: bold;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 2rem;
    }

    .card-title {
        font-size: 1.25rem;
    }

    .card-text {
        font-size: 1.1rem;
        color: #343a40;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .rounded-pill {
        border-radius: 50px !important;
    }
</style>
@endsection
