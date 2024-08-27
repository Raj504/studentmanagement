@extends('layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-info text-white text-center">
        <h3 class="mb-0">Teacher Profile</h3>
    </div>
    <div class="card-body">
        <div class="mb-4">
            <h5 class="card-title">Name: <span class="text-info">{{$teachers->name}}</span></h5>
        </div>
        <div class="mb-3">
            <h6 class="card-subtitle text-muted">Contact Information</h6>
            <p class="card-text"><strong>Address:</strong> {{$teachers->address}}</p>
            <p class="card-text"><strong>Phone:</strong> {{$teachers->phone}}</p>
        </div>
        
    </div>
    <div class="card-footer text-center">
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back to Teachers List</a>
    </div>
</div>

<style>
    .card {
        border-radius: 10px;
        border: none;
    }

    .card-header {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .card-body {
        font-size: 1.1rem;
    }

    .card-title {
        font-size: 1.3rem;
        margin-bottom: 1rem;
    }

    .card-subtitle {
        margin-bottom: 0.5rem;
        font-size: 1.15rem;
        color: #6c757d;
    }

    .card-text {
        margin-bottom: 0.75rem;
    }

    .card-footer {
        background-color: #f8f9fa;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>
@endsection
