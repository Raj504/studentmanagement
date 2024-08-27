<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Enrollment;
use Illuminate\View\View;
use App\Models\Batch;
use App\Models\Student;
use Carbon\Carbon;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::with('batch', 'student')->get();
        // dd($enrollments);
                return view('enrollments.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $batches = Batch::pluck('name', 'id'); 
        $students = Student::pluck('name', 'id'); 

        return view('enrollments.create', compact('batches', 'students'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['join_date'] = Carbon::createFromFormat('d-m-Y', $request->join_date)->format('Y-m-d');

        Enrollment::create($input);
        return redirect('enrollments')->with('flash_message', 'enrollment added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enrollments = Enrollment::find($id);
        return view("enrollments.show")->with('enrollments', $enrollments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
        $enrollment = Enrollment::findOrFail($id);
        $batches = Batch::pluck('name', 'id'); 
        $students = Student::pluck('name', 'id'); 
        return view('enrollments.edit', compact('enrollment', 'batches', 'students'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $enrollments = Enrollment::find($id);
        $input = $request->all();
        $input['join_date'] = Carbon::createFromFormat('d-m-Y', $request->join_date)->format('Y-m-d');

        $enrollments->update($input);
        return view('enrollments')->with('flash_message', 'student Enrolled!');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message', 'enrollment deleted !');
    }
}
