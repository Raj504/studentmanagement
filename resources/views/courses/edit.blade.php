@extends('layout')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white text-center">
        <h3 class="mb-0">Edit Course</h3>
    </div>
    <div class="card-body bg-light">
        <form action="{{ url('courses/' .$courses->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$courses->id}}" />

            <div class="form-group">
                <label for="name" class="text-primary font-weight-bold">Name</label>
                <input type="text" name="name" id="name" value="{{$courses->name}}" class="form-control rounded-pill" placeholder="Enter course name">
            </div>

            <div class="form-group">
                <label for="syllabus" class="text-primary font-weight-bold">Syllabus</label>
                <input type="text" name="syllabus" id="syllabus" value="{{$courses->syllabus}}" class="form-control rounded-pill" placeholder="Enter course syllabus">
            </div>

            <div class="form-group">
                <label for="duration" class="text-primary font-weight-bold">Duration</label>
                <input type="text" name="duration" id="duration" value="{{$courses->duration}}" class="form-control rounded-pill" placeholder="Enter course duration">
            </div>

            <div class="form-group text-center">
                <input type="submit" value="Update" class="btn btn-success btn-lg rounded-pill px-5">
            </div>
        </form>
    </div>
    <div class="card-footer bg-primary text-center">
      <a href="{{ route('courses.index') }}" class="btn btn-light rounded-pill">Back</a>
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

    .rounded-pill {
        border-radius: 50px !important;
    }
</style>
@endsection
