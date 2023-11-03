<?php

namespace App\Http\Controllers;

use App\Models\Principle;
use Illuminate\Http\Request;

class PrincipleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $principle = Principle::orderBy('created_at', 'DESC')->get();
        return view('principle/index', compact('principle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('principle/create');
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
        $principle = new Principle();
        $principle->name = $request->name;
        $principle->email = $request->email;
        $principle->address = $request->address;
        $principle->qualification = $request->qualification;
        $principle->gender = $request->gender;
        // $principle->joining_date = $request->joining_date;
        // $principle->leave_date = $request->leave_date;
        $principle->save();
        return redirect()->route('principle')->with('success', 'Principle added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $principle = Principle::findOrFail($id);
  
        return view('principle.show', compact('principle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $principle = Principle::where('id',$id)->first();
        return view('principle/edit', compact('principle'));
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
            'joining_date' => 'required',
            'leave_date' => 'required',
        ]);
        $principle = Principle::find($id);
        $principle->name = $request->name;
        $principle->email = $request->email;
        $principle->address = $request->address;
        $principle->qualification = $request->qualification;
        $principle->gender = $request->gender;
        $principle->joining_date = $request->joining_date;
        $principle->leave_date = $request->leave_date;
        $principle->save();
        return redirect()->route('principle')->with('success', 'Principle Update successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $principle = Principle::findOrFail($id);
  
        $principle->delete();
  
        return redirect()->route('principle')->with('success', 'Principle deleted successfully');
    }
}
