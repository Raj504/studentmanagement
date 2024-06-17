@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
      
      <form action="{{ url('/students') }}" method="post">
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
    </form>
   
  </div>
</div>
 
@stop