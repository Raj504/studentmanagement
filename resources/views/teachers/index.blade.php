    @extends('layout')
    @section('content')

    <style>
        .center-card {
            display: center;
            justify-content: center;
            align-items: center;
            min-height: 80vh; /* Adjust this value based on your layout needs */
        }
    </style>

            <div class="card">
                <div class="card-header">
                    <h2>Teachers Application</h2>
                </div>
                <div class="card-body">
                    <a href="{{url('/teachers/create')}}" class="btn btn-success btn-sm mb-3" title="Add new teachers">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <div class="table-responsive">
                        <table class="table">
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
                                    <td class="d-flex">
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
    </div>

    @endsection
