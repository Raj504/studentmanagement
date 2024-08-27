<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::all();
      
        return view ('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email_id' => 'required|email|unique:students,email_id', // Ensure unique email
        ]);
    
        // Create a new student record
        Student::create($validated);
    
        // Redirect to the students index with a success message
        return redirect()->route('students.index')->with('flash_message', 'Student added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): view
    {
        $student = Student::find($id);
        return view("students.show")->with('students', $student);
    }

    /**
     * edit
     */
    public function edit(string $id):view
    {
        $student = student::find($id);
        return view("students.edit")->with('students', $student);
    }

    /**
     * Update 
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $input = $request->all();
        $student->update($input);
        return redirect('students')->with('flash_message', 'student Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        Student::destroy($id);
        return redirect('students')->with('flash_message', 'student deleted !');
    }
}
