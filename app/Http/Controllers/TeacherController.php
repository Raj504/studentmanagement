<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;



use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $teachers = Teacher::all();
        return view ('teachers.index')->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        teacher::create($input);
        return redirect('teachers')->with('flash_message', 'teacher added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): view
    {
        $teachers = Teacher::find($id);
        return view("teachers.show")->with('teachers', $teachers);
    }

    /**
     * edit
     */
    public function edit(string $id):view
    {
        $teachers = teacher::find($id);
        return view("teachers.edit")->with('teachers', $teachers);
    }

    /**
     * Update 
     */
    public function update(Request $request, string $id)
    {
        $teacher = Teacher::find($id);
        $input = $request->all();
        $teacher->update($input);
        return redirect('teachers')->with('flash_message', 'teacher Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        Teacher::destroy($id);
        return redirect('teachers')->with('flash_message', 'teacher deleted !');
    }
}
