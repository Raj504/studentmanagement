@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">payment Page</div>
  <div class="card-body">
      
      <form action="{{ url('payments/' .$payments->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$payments->id}}" id="id" />
   
        <label>Enrollment No</label></br>
        <select name="enrollment_id" id="enrollment_id" class="form-control">
          @foreach ($payments as $payment => $enroll_no)
          <option value="{{ $id }}">{{ $id == $payment->enrollment_id ? 'selected' : '' }}>{{ $enroll_no  }}</option>  
          @endforeach

        </select> 

        <input type="text" name="name" id="name" value="{{$payments->id}}" class="form-control"></br>
        <label>Paid Date</label></br>
        <input type="text" name="paid_date" id="paid_date" value="{{$payments->paid_date}}" class="form-control"></br>
        <label>Amount</label></br>
        <input type="text" name="amount" id="amount" value="{{$payments->amount}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@endsection