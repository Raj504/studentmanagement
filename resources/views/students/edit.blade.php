@extends('layout')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Edit Student</h3>
    </div>
    <div class="card-body bg-light">
        <form action="{{ url('students/' .$students->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$students->id}}" />

            <div class="form-group">
                <label for="name" class="text-primary">Name</label>
                <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control" placeholder="Enter student name">
            </div>

            <div class="form-group">
                <label for="address" class="text-primary">Address</label>
                <input type="text" name="address" id="address" value="{{$students->address}}" class="form-control" placeholder="Enter student address">
            </div>

            <div class="form-group">
                <label for="email_id" class="text-primary">Email Id</label>
                <input type="email" name="email_id" id="email_id" value="{{$students->email_id}}" class="form-control" placeholder="Enter student email">
            </div>

            <div class="form-group">
                <label for="phone" class="text-primary">Mobile</label>
                <input type="text" name="phone" id="phone" value="{{$students->phone}}" class="form-control" placeholder="Enter student phone number">
            </div>

            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-success btn-lg rounded-pill px-5">
            </div>
        </form>
    </div>
    <div class="card-footer bg-primary text-center">
        <a href="{{ route('students.index') }}"  class="btn btn-light rounded-pill">Back</a>
    </div>
</div>
@endsection
