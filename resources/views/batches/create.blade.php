@extends('layout')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white text-center">
        <h3 class="mb-0">Add New Batch</h3>
    </div>
    <div class="card-body bg-light">
        <form action="{{ url('batches') }}" method="post">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="name" class="text-primary font-weight-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control rounded-pill" placeholder="Enter batch name">
            </div>

            <div class="form-group">
                    <label for="course_id" class="text-primary font-weight-bold">Course</label>
                    <select name="course_id" id="course_id" class="form-control rounded-pill">
                        @foreach ($courses as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>  
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                  <label for="start_date" class="text-primary font-weight-bold">Start Date</label>
                  <input type="date" name="start_date" id="start_date" class="form-control rounded-pill">
              </div>

            <div class="form-group text-center">
                <input type="submit" value="Save" class="btn btn-success btn-lg rounded-pill px-5">
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

    .rounded-pill {
        border-radius: 50px !important;
    }
</style>
<!-- jQuery and jQuery UI scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
    $(function() {
        $("#start_date").datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true
        });
    });
</script>
@endsection
