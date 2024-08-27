@extends('layout')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white text-center">
        <h3 class="mb-0">Course Details</h3>
    </div>
    <div class="card-body bg-light">
        <h5 class="card-title text-primary font-weight-bold">Name: <span class="text-dark">{{$courses->name}}</span></h5>
        <p class="card-text"><strong class="text-primary">Syllabus:</strong> {{$courses->syllabus}}</p>
        <p class="card-text"><strong class="text-primary">Duration:</strong> {{$courses->duration()}}</p>
    </div>
    <div class="card-footer bg-primary text-center">
        <a href="{{ route('courses.index') }}" class="btn btn-light rounded-pill">Back to Courses</a>
    </div>
</div>

<style>
    .card-header {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .card-body {
        padding: 2rem;
    }

    .card-title {
        font-size: 1.3rem;
        margin-bottom: 1rem;
    }

    .card-text {
        font-size: 1.1rem;
        margin-bottom: 0.75rem;
    }

    .card-footer {
        padding: 1rem;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .btn-light {
        border: 2px solid #ffffff;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-light:hover {
        background-color: #ffffff;
        color: #0056b3;
    }
</style>
@endsection
