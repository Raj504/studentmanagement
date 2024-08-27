@extends('layout')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white text-center">
        <h3 class="mb-0">Edit Teacher</h3>
    </div>
    <div class="card-body bg-light">
        <form action="{{ url('teachers/' .$teachers->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$teachers->id}}" />

            <div class="form-group">
                <label for="name" class="text-primary font-weight-bold">Name</label>
                <input type="text" name="name" id="name" value="{{$teachers->name}}" class="form-control rounded-pill" placeholder="Enter teacher name">
            </div>

            <div class="form-group">
                <label for="address" class="text-primary font-weight-bold">Address</label>
                <input type="text" name="address" id="address" value="{{$teachers->address}}" class="form-control rounded-pill" placeholder="Enter teacher address">
            </div>

            <div class="form-group">
                <label for="phone" class="text-primary font-weight-bold">Mobile</label>
                <input type="text" name="phone" id="phone" value="{{$teachers->phone}}" class="form-control rounded-pill" placeholder="Enter teacher phone number">
            </div>

            <div class="form-group text-center">
                <input type="submit" value="Update" class="btn btn-success btn-lg rounded-pill px-5">
            </div>
        </form>
    </div>
    <div class="card-footer bg-primary text-center">
        <a href="{{ route('teachers.index') }}" class="btn btn-light rounded-pill">Back</a>
    </div>
</div>

<style>
    .card-header {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .card-body {
        background-color: #f8f9fa;
        padding: 2rem;
    }

    .form-group label {
        font-size: 1.1rem;
        color: #0056b3;
    }

    .form-control {
        font-size: 1rem;
        padding: 0.75rem;
    }

    .form-control:focus {
        border-color: #0056b3;
        box-shadow: 0 0 5px rgba(0, 86, 179, 0.2);
    }

    .btn-success {
        background-color: #28a745;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-light {
        border: 2px solid #ffffff;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-light:hover {
        background-color: #ffffff;
        color: #0056b3;
    }

    .rounded-pill {
        border-radius: 50px !important;
    }
</style>
@endsection
