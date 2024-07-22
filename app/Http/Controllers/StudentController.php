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
        
        $input = $request->all();
        Student::create($input);
        
        return redirect('students')->with('flash_message', 'Student added!');
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
