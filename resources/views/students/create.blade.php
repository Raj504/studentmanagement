@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
      
      <form id="studentForm">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" required></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control" required></br>
        <label for="email">Email Id:</label>
        <input type="email" name="email" id="email" class="form-control" required></br>  
        <label>Phone</label></br>
        <input type="text" name="phone" id="phone" class="form-control" pattern="[0-9]{10}"
        placeholder="Enter 10-digit mobile number"
        required></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
        <div>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
   
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#studentForm').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: '{{ url("/students") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert('Student saved successfully!');
                // Optionally, you can clear the form or redirect the user
                $('#studentForm')[0].reset();
            },
            error: function(xhr) {
                alert('An error occurred. Please try again.');
            }
        });
    });
});
</script>

@stop
