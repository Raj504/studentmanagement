@extends('layout')
@section('content')

<style>
    /* Card styles */
    .card {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: none;
        background-color: #ffffff;
        margin: 20px;
    }

    .card-header {
        background-color: #007bff;
        color: #ffffff;
        padding: 15px;
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .card-body {
        padding: 20px;
        background-color: #f8f9fa;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 10px;
        font-size: 1rem;
        margin-bottom: 15px;
        background-color: #fff;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    label {
        font-weight: bold;
        color: #343a40;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .card-header {
            font-size: 1.2rem;
        }

        .btn-success {
            font-size: 0.9rem;
            padding: 8px 16px;
        }
    }
</style>

<div class="card">
  <div class="card-header">Payment Page</div>
  <div class="card-body">
      
      <form action="{{ url('payments/' . $payment->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $payment->id }}" />

        <label for="enrollment_id">Enrollment No</label></br>
        <select name="enrollment_id" id="enrollment_id" class="form-control">
          @foreach ($enrollments as $id => $enroll_no)
          <option value="{{ $id }}" {{ $id == $payment->enrollment_id ? 'selected' : '' }}>{{ $enroll_no }}</option>
          @endforeach
        </select>

        <label for="paid_date">Paid Date</label></br>
        <input type="date" name="paid_date" id="paid_date" value="{{ $payment->paid_date }}" class="form-control"></br>
        
        <label for="amount">Amount</label></br>
        <input type="number" step="0.01" name="amount" id="amount" value="{{ $payment->amount }}" class="form-control"></br>
        
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
 
  </div>
</div>

@endsection
