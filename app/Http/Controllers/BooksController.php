<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Book;
 
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'DESC')->get();
  
        return view('books.index', compact('books'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Book::create($request->all());
 
        return redirect()->route('books')->with('success', 'Book added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Book::findOrFail($id);
  
        return view('books.show', compact('books'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = Book::findOrFail($id);
  
        return view('books.edit', compact('books'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $books = Book::findOrFail($id);
  
        $books->update($request->all());
  
        return redirect()->route('books')->with('success', 'Book updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Book::findOrFail($id);
  
        $books->delete();
  
        return redirect()->route('books')->with('success', 'Books deleted successfully');
    }
}