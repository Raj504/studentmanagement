@extends('layout')

@section('content')

<style>
    .center-card {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh; /* Adjust this value based on your layout needs */
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .card-header {
        background-color: #4b49ac;
        color: #fff;
        padding: 15px;
        font-size: 1.5rem;
        text-align: center;
    }

    .card-body {
        background-color: #f4f7f6;
        padding: 20px;
    }

    .table-responsive {
        margin-top: 20px;
    }

    .table th {
        background-color: #4b49ac;
        color: #fff;
        text-align: center;
    }

    .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table-hover tbody tr:hover {
        background-color: #f0f0f0;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-info {
        background-color: #17a2b8;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-info:hover {
        background-color: #138496;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0069d9;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn i {
        margin-right: 5px;
    }
</style>

<div class="center-card">
    <div class="card w-100">
        <div class="card-header">
            <h2>Teachers Application</h2>
        </div>
        <div class="card-body">
            <a href="{{url('/teachers/create')}}" class="btn btn-success btn-sm mb-3" title="Add new teachers">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ url('/teachers/' . $item->id) }}" title="View Teacher" class="btn btn-info btn-sm mr-1">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                </a>   
                                <a href="{{ url('/teachers/' . $item->id . '/edit') }}" title="Edit Teacher" class="btn btn-primary btn-sm mr-1">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </a>    
                                <form method="POST" action="{{ url('/teachers/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Teacher" onclick="return confirm('Confirm delete?')">
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
</div>

@endsection
