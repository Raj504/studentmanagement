@extends('layout')
@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white text-center">
        <h3 class="mb-0">Edit Enrollment</h3>
    </div>
    <div class="card-body bg-light">
        <form action="{{ url('enrollments/' . $enrollment->id) }}" method="post">
          @if (session('flash_message'))
    <div class="alert alert-success">
        {{ session('flash_message') }}
    </div>
@endif
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{ $enrollment->id }}" />

            <div class="form-group">
                <label for="enroll_no" class="text-primary font-weight-bold">Enroll No</label>
                <input type="text" name="enroll_no" id="enroll_no" value="{{ $enrollment->enroll_no }}" class="form-control rounded-pill" placeholder="Enter enrollment number">
            </div>

            <div class="form-group">
              <label for="batch_id" class="text-primary font-weight-bold">Batch</label>
              <select name="batch_id" id="batch_id" class="form-control rounded-pill">
                  <option value="">Select Batch</option>
                  @foreach($batches as $id => $name)
                      <option value="{{ $id }}" {{ $id == $enrollment->batch_id ? 'selected' : '' }}>{{ $name }}</option>
                  @endforeach
              </select>
          </div>

          <div class="form-group">
              <label for="student_id" class="text-primary font-weight-bold">Student</label>
              <select name="student_id" id="student_id" class="form-control rounded-pill">
                  <option value="">Select Student</option>
                  @foreach($students as $id => $name)
                      <option value="{{ $id }}" {{ $id == $enrollment->student_id ? 'selected' : '' }}>{{ $name }}</option>
                  @endforeach
              </select>
          </div>

            <div class="form-group">
                <label for="join_date" class="text-primary font-weight-bold">Join Date</label>
                <input type="text" name="join_date" id="join_date" value="{{ \Carbon\Carbon::parse($enrollment->join_date)->format('d-m-Y') }}" class="form-control rounded-pill" placeholder="Enter join date">
            </div>

            <div class="form-group">
                <label for="fee" class="text-primary font-weight-bold">Fee</label>
                <input type="text" name="fee" id="fee" value="{{ $enrollment->fee }}" class="form-control rounded-pill" placeholder="Enter fee amount">
            </div>

            <div class="form-group text-center">
                <input type="submit" value="Update" class="btn btn-success btn-lg rounded-pill px-5">
            </div>
        </form>
    </div>
    <div class="card-footer bg-light text-center">
        <a href="{{ route('enrollments.index') }}" class="btn btn-secondary rounded-pill">Back</a>
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

    .form-group label {
        font-size: 1.1rem;
        color: #0056b3;
    }

    .form-control {
        font-size: 1rem;
        padding: 0.55rem;
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
    $(function() {
        $("#join_date").datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true
        });
    });
</script>

@endsection
