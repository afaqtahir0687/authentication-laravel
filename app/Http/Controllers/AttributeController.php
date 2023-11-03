<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attribute = Attribute::all();
        return view('attribute.index', compact('attribute'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $attribute = new Attribute();
        $attribute->name = $request->name;
        $attribute->save();
        return redirect()->route('attribute.index')->with('success', 'Attribute Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attribute = Attribute::where('id', $id)->first();
        return view('attribute.show', compact('attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attribute = Attribute::where('id', $id)->first();
        return view('attribute.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $attribute = Attribute::find($id);
        $attribute->name = $request->name;
        $attribute->save();
        return redirect()->route('attribute.index')->with('success', 'Attribute Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attribute = Attribute::find($id);
        $attribute->delete();
        return redirect()->route('attribute.index')->with('success', 'Attribute Delete Successfully');
    }
}
