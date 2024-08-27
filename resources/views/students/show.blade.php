@extends('layout')

@section('content')
<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Student Profile</h3>
    </div>
    <div class="card-body bg-light">
        <div class="mb-3">
            <h5 class="text-primary">Name:</h5>
            <p class="font-weight-bold">{{$students->name}}</p>
        </div>
        <div class="mb-3">
            <h5 class="text-primary">Address:</h5>
            <p class="font-weight-bold">{{$students->address}}</p>
        </div>
        <div class="mb-3">
            <h5 class="text-primary">Phone:</h5>
            <p class="font-weight-bold">{{$students->phone}}</p>
        </div>
        <div class="mb-3">
            <h5 class="text-primary">Email:</h5>
            <p class="font-weight-bold">{{$students->email_id}}</p>
        </div>
    </div>
    <div class="card-footer bg-primary text-center">
        <a href="{{ route('students.index') }}" class="btn btn-light">Back</a>
    </div>
</div>
@endsection
