<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $courses = Course::all();
        return view ('courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():view
    {   
        return view ('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $course = new Course();
        $course->name = $request->input('name');
        $course->syllabus = $request->input('syllabus');
        $course->duration = $request->input('duration');
        $course->save();
    
        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):view
    {
        $course = Course::find($id);
        return view("courses.show")->with('courses', $course);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):view
    {
        $course = Course::find($id);
        return view("courses.edit")->with('courses', $course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        $course = Course::find($id);
        $input = $request->all();
        $course->update($input);
        return redirect('courses')->with('flash_message', 'course Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        Course::destroy($id);
        return redirect('courses')->with('flash_message', 'course deleted !');
    }
}
