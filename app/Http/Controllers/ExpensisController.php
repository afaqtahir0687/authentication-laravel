<?php

namespace App\Http\Controllers;
use App\Models\Expensis;
use Illuminate\Http\Request;

class ExpensisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expensis = Expensis::all();
        return view('expensis.index', compact('expensis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expensis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            
        ]);
        $expensis = new Expensis();
        $expensis->name = $request->name;
        $expensis->description = $request->description;
        $expensis->save();
        return redirect()->route('expensis')->with('success', 'Expensis added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $expensis = Expensis::where('id', $id)->first();
        return view('expensis/show', compact('expensis'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expensis = Expensis::where('id', $id)->first();
        return view('expensis/edit', compact('expensis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            
        ]);
        $expensis = Expensis::find($id);
        $expensis->name = $request->name;
        $expensis->description = $request->description;
        $expensis->save();
        return redirect()->route('expensis')->with('success', 'Expensis Update successfully');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expensis = Expensis::find($id);
        $expensis->delete();
        return redirect()->route('expensis')->with('success', 'Expensis Update successfully');

    }
}
