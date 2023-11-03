<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentMonth = Carbon::now()->format('m');
        $accounts = Account::with('student')->whereMonth('created_at', $currentMonth)
            ->orderByDesc('created_at')->get();
        return view('accounts.index', ['accounts' => $accounts, 'currentMonth' => $currentMonth]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Student::all();
        return view('accounts/create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'month' => 'required',
            'fees' => 'required',
        ]);

        $account = new Account();
        $account->student_id = $request->student_id;
        $account->fees = $request->fees;
        $account->month = $request->month;
        $account->save();
        return redirect()->route('accounts')->with('success', 'Account added successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $student = Student::all();
        $account = Account::find($id);
        return view('accounts.show', compact('student', 'account'));
        
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $student = Student::all();
        $account = Account::find($id);
        return view('accounts.edit', compact('student', 'account'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'fees' => 'required',
            'month' => 'required',
        ]);
    
        $account = Account::find($id);
        $account->fees = $request->fees;
        $account->month = $request->month;
        $account->save();
    
        return redirect()->route('accounts')->with('success', 'Account updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account = Account::find($id);
        $account->delete();
    
        return redirect()->route('accounts')->with('success', 'Account deleted successfully');
    }
}
