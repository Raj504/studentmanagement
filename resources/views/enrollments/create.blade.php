@extends('layout')
@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white text-center">
        <h3 class="mb-0">Add New Enrollment</h3>
    </div>
    <div class="card-body bg-light">
        <form action="{{ url('enrollments') }}" method="post">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="enroll_no" class="text-primary font-weight-bold">Enroll No</label>
                <input type="text" name="enroll_no" id="enroll_no" class="form-control rounded-pill" placeholder="Enter enrollment number">
            </div>

            <div class="form-group">
                <label for="batch_id" class="text-primary font-weight-bold">Batch</label>
                <select name="batch_id" id="batch_id" class="form-control rounded-pill">
                    <option value="">Select Batch</option>
                    @foreach($batches as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="student_id" class="text-primary font-weight-bold">Student</label>
                <select name="student_id" id="student_id" class="form-control rounded-pill">
                  <option value="">Select Student</option>
                  @foreach($students as $id => $name)
                      <option value="{{ $id }}">{{ $name }}</option>
                  @endforeach
              </select>
            </div>

            <div class="form-group">
                <label for="join_date" class="text-primary font-weight-bold">Join Date</label>
                <input type="text" name="join_date" id="join_date" class="form-control rounded-pill" placeholder="Select join date">
            </div>

            <div class="form-group">
                <label for="fee" class="text-primary font-weight-bold">Fee</label>
                <input type="text" name="fee" id="fee" class="form-control rounded-pill" placeholder="Enter fee amount">
            </div>

            <div class="form-group text-center">
                <input type="submit" value="Save" class="btn btn-success btn-lg rounded-pill px-5">
            </div>
        </form>
    </div>
</div>
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
