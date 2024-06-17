@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">Edit Page</div>
    <div class="card-body">
        <form action="{{ url('students/' .$students->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$students->id}}" />
            <label>Name</label><br>
            <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control"><br>
            <label>Address</label><br>
            <input type="text" name="address" id="address" value="{{$students->address}}" class="form-control"><br>
            <label>Email Id</label><br>
            <input type="text" name="email_id" id="email_id" value="{{$students->email_id}}" class="form-control"><br>
            <label>Mobile</label><br>
            <input type="text" name="phone" id="phone" value="{{$students->phone}}" class="form-control"><br>
            <input type="submit" value="Update" class="btn btn-success"><br>
        </form>
    </div>
    <div class="card-footer">
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
