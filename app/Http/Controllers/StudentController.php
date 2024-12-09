<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('dashboard', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required',
            'address' => 'required',
        ]);
        Student::create($request->all());
        return redirect()->route('dashboard')->with('success', 'Student added successfully');
    }

public function destroy(Student $student) {
    
    $student->delete();
    return redirect()->route('dashboard')->with('success', 'Student removed successfully');
}
}
