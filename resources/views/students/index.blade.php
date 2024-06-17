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
                    <h2>Students Application</h2>
                </div>
                <div class="card-body">
                    <a href="{{url('/students/create')}}" class="btn btn-success btn-sm mb-3" title="Add new student">
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
                                    <th>Email Id</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email_id }}</td>
                                    <td class="d-flex">
                                        <a href="{{ url('/students/' . $item->id) }}" title="View Student" class="btn btn-info btn-sm mr-1">
                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                        </a>   
                                        <a href="{{ url('/students/' . $item->id . '/edit') }}" title="Edit Student" class="btn btn-primary btn-sm mr-1">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                        </a>    
                                        <form method="POST" action="{{ url('/students/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('Confirm delete?')">
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
