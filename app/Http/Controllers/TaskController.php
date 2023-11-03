<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task = Department::all();;
        return view('task.index', compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $task = new Department();
        $task->company_name = $request->name;
        $task->save();
        return redirect()->route('task')->with('success', 'Department Save successfully');
    }

    public function show(Request $request, string $id)
    {
        $task = Department::find($id);
        $currentYear = Carbon::now()->year;
        $searchedMonth = $request->input('month');

        if ($searchedMonth) {
            try {
                $monthNumber = Carbon::parse($searchedMonth)->month;
            } catch (\Exception $e) {
                $monthNumber = Carbon::now()->month;
            }
        } else {
            $monthNumber = Carbon::now()->month;
        }
        if (date('m') == $monthNumber) {

            $lastDayOfMonth = date('d');
        } else {

            $lastDayOfMonth = Carbon::createFromDate($currentYear, $monthNumber + 1, 1)->subDay()->day;
        }
        $dates = [];

        for ($day = $lastDayOfMonth; $day >= 1; $day--) {
            $date = Carbon::createFromDate($currentYear, $monthNumber, $day)->format('Y-m-d');
            $dates[] = $date;
        }
        $dates = array_reverse($dates);
        return view('task.show', compact('task', 'dates'));
    }


    public function edit(string $id)
    {
        $task = Department::where('id', $id)->first();;
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $task = Department::find($id);
        $task->company_name = $request->name;
        $task->save();
        return redirect()->route('task')->with('success', 'Department Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Department::find($id);
        $task->delete();
        return redirect()->route('task')->with('success', 'Department Delete successfully');
    }
}
