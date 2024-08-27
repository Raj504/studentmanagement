@extends('layout')
@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white text-center">
        <h3 class="mb-0">Enrollment Details</h3>
    </div>
    <div class="card-body bg-light">
        <div class="p-4">
            <h5 class="card-title text-secondary font-weight-bold">Enrollment Number:</h5>
            <p class="card-text bg-white p-2 rounded">{{ $enrollments->enroll_no }}</p>

            <h5 class="card-title text-secondary font-weight-bold">Batch:</h5>
            <p class="card-text bg-white p-2 rounded">{{ $enrollments->batch->name }}</p>

            <h5 class="card-title text-secondary font-weight-bold">Student:</h5>
            <p class="card-text bg-white p-2 rounded">{{ $enrollments->student->name }}</p>

            <h5 class="card-title text-secondary font-weight-bold">Join Date:</h5>
            <p class="card-text bg-white p-2 rounded">{{ \Carbon\Carbon::parse($enrollments->join_date)->format('d-m-Y') }}</p>

            <h5 class="card-title text-secondary font-weight-bold">Fee:</h5>
            <p class="card-text bg-white p-2 rounded">{{ $enrollments->fee }}</p>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('enrollments.index') }}" class="btn btn-secondary btn-lg rounded-pill">Back</a>
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
        background-color: #f8f9fa !important;
    }

    .card-title {
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
    }

    .card-text {
        margin-bottom: 1.5rem;
        font-size: 1rem;
    }

    .bg-white {
        background-color: #ffffff !important;
        border: 1px solid #ddd;
    }

    .rounded {
        border-radius: 0.5rem !important;
    }

    .text-secondary {
        color: #6c757d !important;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .rounded-pill {
        border-radius: 50px !important;
    }
</style>

@endsection
