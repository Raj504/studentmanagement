@extends('layout')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Students Page</h4>
        </div>
        <div class="card-body bg-light">
            
            <form action="{{ url('students') }}" method="post">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                {!! csrf_field() !!}
                
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="email_id" class="form-label">Email ID</label>
                    <input type="email" name="email_id" id="email_id" class="form-control" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" pattern="[0-9]{10}" placeholder="Enter 10-digit mobile number" required>
                </div>
                
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                </div>
                
            </form>
        
        </div>
    </div>
</div>

@stop
