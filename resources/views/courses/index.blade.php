@extends('layout')

@section('content')
<style>
    .card {
        border-radius: 10px;
        border: none;
        background-color: #f8f9fa;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #007bff;
        color: white;
        font-size: 1.5rem;
        text-align: center;
        padding: 1rem;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 2rem;
    }

    .table {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    }

    .table th {
        background-color: #007bff;
        color: white;
        font-size: 1rem;
        text-align: center;
        padding: 1rem;
    }

    .table td {
        font-size: 1rem;
        padding: 1rem;
        text-align: center;
        vertical-align: middle;
    }

    .btn-sm {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        border-radius: 5px;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-info {
        background-color: #17a2b8;
        border: none;
    }

    .btn-info:hover {
        background-color: #138496;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0069d9;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .center-card {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh; /* Adjust this value based on your layout needs */
    }
</style>

<div class="card">
    <div class="card-header">
        <h2>Courses Application</h2>
    </div>
    <div class="card-body">
        <a href="{{url('/courses/create')}}" class="btn btn-success btn-sm mb-3" title="Add new course">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Syllabus</th>
                        <th>Duration</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->syllabus }}</td>
                        <td>{{ $item->duration() }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ url('/courses/' . $item->id) }}" title="View Course" class="btn btn-info btn-sm mr-1">
                                <i class="fa fa-eye" aria-hidden="true"></i> View
                            </a>   
                            <a href="{{ url('/courses/' . $item->id . '/edit') }}" title="Edit course" class="btn btn-primary btn-sm mr-1">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </a>    
                            <form method="POST" action="{{ url('/courses/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Course" onclick="return confirm('Confirm delete?')">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                </button>
                            </form>
                        </td>  
                    </tr>                           
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
