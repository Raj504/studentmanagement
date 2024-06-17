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
                    <h2>Courses Application</h2>
                </div>
                <div class="card-body">
                    <a href="{{url('/courses/create')}}" class="btn btn-success btn-sm mb-3" title="Add new course">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <div class="table-responsive">
                        <table class="table">
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
                                    <td class="d-flex">
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
        </div>
    </div>

    @endsection
