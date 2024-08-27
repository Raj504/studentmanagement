@extends('layout')
@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white text-center">
        <h3 class="mb-0">Edit Batch</h3>
    </div>
    <div class="card-body bg-light">
        <form action="{{ url('batches/' .$batch->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{ $batch->id }}" />

            <div class="form-group">
                <label for="name" class="text-primary font-weight-bold">Name</label>
                <input type="text" name="name" id="name" value="{{ $batch->name }}" class="form-control rounded-pill" placeholder="Enter batch name">
            </div>

            <div class="form-group">
                <label for="course_id" class="text-primary font-weight-bold">Course</label>
                <select name="course_id" id="course_id" class="form-control rounded-pill">
                    @foreach ($courses as $id => $name)
                        <option value="{{ $id }}" {{ $id == $batch->course_id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="start_date" class="text-primary font-weight-bold">Start Date</label>
                <input type="text" name="start_date" id="start_date" value="{{ \Carbon\Carbon::parse($batch->start_date)->format('d-m-Y') }}" class="form-control rounded-pill">
            </div>

            <div class="form-group text-center">
                <input type="submit" value="Update" class="btn btn-success btn-lg rounded-pill px-5">
                <a href="{{ route('batches.index') }}" class="btn btn-secondary btn-lg rounded-pill px-5 ml-3">Back</a>
            </div>
        </form>
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
        padding: 0.52rem;
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

    .bg-light {
        background-color: #f8f9fa !important;
    }
</style>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
$(document).ready(function() {
    $("#start_date").datepicker({
        dateFormat: "dd-mm-yy", // Ensure this matches your desired format
        changeMonth: true,
        changeYear: true,
        onSelect: function(dateText, inst) {
            $(this).val(dateText); // This should update the input with the selected date
        }
    });
});
</script>
@endsection
