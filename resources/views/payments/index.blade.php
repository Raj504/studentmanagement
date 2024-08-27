@extends('layout')
@section('content')

@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
<style>
    /* Full page card */
    .center-card {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; /* Makes the card cover the full height of the viewport */
        margin: 0;
        padding: 0;
    }

    /* Card styles */
    .card {
        width: 100%; /* Makes the card full width */
        max-width: 1200px; /* Optional: Limits the card width for larger screens */
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .card-body {
        background-color: #f8f9fa;
    }

    /* Button styles */
    .btn {
        border-radius: 8px;
        font-size: 0.875rem; /* Font size for buttons */
        padding: 10px 16px; /* Padding for larger buttons */
        line-height: 1.5;
        text-align: center;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-sm {
        font-size: 0.75rem; /* Font size for small buttons */
        padding: 6px 12px; /* Padding for small buttons */
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    /* Table styles */
    .table {
        background-color: #fff;
        border-radius: 12px;
        overflow: hidden;
    }

    .table th {
        background-color: #007bff;
        color: #fff;
    }

    .table td {
        vertical-align: middle;
    }

    /* Hover effects */
    .btn:hover {
        opacity: 0.9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .card-header h2 {
            font-size: 1.5rem;
        }

        .btn {
            padding: 8px 14px; /* Adjust padding for responsiveness */
        }

        .btn-sm {
            padding: 5px 10px;
        }

        .table-responsive {
            overflow-x: auto;
        }
    }
</style>

<div class="center-card">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Payments Application</h2>
        </div>
        <div class="card-body">
            <a href="{{ url('/payments/create') }}" class="btn btn-success btn-sm mb-3" title="Add new payment">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Enrollment No</th>
                            <th>Paid Date</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->enrollment ? $item->enrollment->enroll_no : "-" }}</td>
                            <td>{{ $item->paid_date }}</td>
                            <td>{{ $item->amount }}</td>
                            <td class="d-flex">
                                <a href="{{ url('/payments/' . $item->id) }}" title="View payment" class="btn btn-info btn-sm mr-1">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                </a>
                                <a href="{{ url('/payments/' . $item->id . '/edit') }}" title="Edit payment" class="btn btn-primary btn-sm mr-1">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </a>
                                <form method="POST" action="{{ url('/payments/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete payment" onclick="return confirm('Confirm delete?')">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                    </button>
                                </form>
                            
                                <a href="{{ url('/stripe/payment?amount=' . urlencode($item->amount)) }}" class="btn btn-primary btn-sm mb-3" title="Go to Payment">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i> Go to Payment
                                </a>
    
                                <a href="{{ url('/report/report1/' . $item->id) }}" title="Print Payment" class="btn btn-success btn-sm">
                                    <i class="fa fa-print" aria-hidden="true"></i> Print
                                </a>
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
