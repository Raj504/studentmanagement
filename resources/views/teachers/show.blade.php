@extends('layout')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white">
        <h3 class="mb-0">Teacher Profile</h3>
    </div>
    <div class="card-body">
        <div class="d-flex align-items-center mb-4">
            <img src="{{ asset('images/dummy-profile.png') }}" alt="Profile Image" class="rounded-circle" width="100" height="100">
            <div class="ml-4">
                <h5 class="card-title mb-0">Name: {{$teachers->name}}</h5>
                <p class="text-muted mb-0">Email: dummyteacher@example.com</p>
            </div>
        </div>
        <div class="mb-3">
            <h6 class="card-subtitle text-muted">Contact Information</h6>
            <p class="card-text">Address: {{$teachers->address}}</p>
            <p class="card-text">Phone: {{$teachers->phone}}</p>
        </div>
        <div class="mb-3">
            <h6 class="card-subtitle text-muted">Additional Information</h6>
            <p class="card-text">Profile Image: Placeholder image used</p>
            <p class="card-text">Email: dummyteacher@example.com</p>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
