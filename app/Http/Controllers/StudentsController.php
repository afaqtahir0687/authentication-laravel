<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::orderBy('created_at', 'DESC')->get();        ;
        return view('students/index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students/create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'fees' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
        ]);
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->fees = $request->fees;
        $student->nationality = $request->nationality;
        $student->gender = $request->gender;
        $student->save();
        return redirect()->route('students')->with('success', 'Student added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
  
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::where('id', $id)->first();        ;
        return view('students/edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'fees' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
        ]);
        $student = Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->fees = $request->fees;
        $student->nationality = $request->nationality;
        $student->gender = $request->gender;
        $student->save();
        return redirect()->route('students')->with('success', 'Student added successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
  
        $student->delete();
  
        return redirect()->route('students')->with('success', 'Student deleted successfully');
    }
}
