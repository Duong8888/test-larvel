<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassesStudentController extends Controller
{
    public function index()
    {
        $classes = Classes::with('students')->get();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        $students = Student::all();
        return view('classes.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'students' => 'array',
            'students.*' => 'exists:students,id',
        ]);

        $class = Classes::create(['name' => $request->name]);

        if ($request->has('students')) {
            $class->students()->attach($request->students);
        }

        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    public function show(Classes $class)
    {
        $class->load('students');
        return view('classes.show', compact('class'));
    }

    public function edit(Classes $class)
    {
        $students = Student::all();
        $class->load('students');
        return view('classes.edit', compact('class', 'students'));
    }

    public function update(Request $request, Classes $class)
    {
        $request->validate([
            'name' => 'required',
            'students' => 'array',
            'students.*' => 'exists:students,id',
        ]);

        $class->update(['name' => $request->name]);

        if ($request->has('students')) {
            $class->students()->sync($request->students);
        } else {
            $class->students()->detach();
        }

        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy(Classes $class)
    {
        $class->students()->detach();
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
