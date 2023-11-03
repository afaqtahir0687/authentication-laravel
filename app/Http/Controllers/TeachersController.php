<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::orderBy('created_at', 'DESC')->get();        ;
        return view('teachers/index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'qualification' => 'required',
            // 'joining_date' => 'required',
            // 'leave_date' => 'required',
        ]);
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->address = $request->address;
        $teacher->qualification = $request->qualification;
        $teacher->gender = $request->gender;
        // $teacher->joining_date = $request->joining_date;
        // $teacher->leave_date = $request->leave_date;
        $teacher->save();
        return redirect()->route('teachers')->with('success', 'Teacher added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::findOrFail($id);
  
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::where('id', $id)->first();   ;
        return view('teachers/edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'qualification' => 'required',
            // 'joining_date' => 'required',
            // 'leave_date' => 'required',
        ]);
        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->address = $request->address;
        $teacher->qualification = $request->qualification;
        $teacher->gender = $request->gender;
        // $teacher->joining_date = $request->joining_date;
        // $teacher->leave_date = $request->leave_date;
        $teacher->save();
        return redirect()->route('teachers')->with('success', 'Teacher Update successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);
  
        $teacher->delete();
  
        return redirect()->route('teachers')->with('success', 'Teacher deleted successfully');
    }
}
