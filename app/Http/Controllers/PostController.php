<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['user'])->orderBy('created_at', 'DESC')->get();
        return view('posts/index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $user = User::all();
        // $user = Auth::user();
        // echo $user->name;
        // dd($user);
        return view('posts.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'text' => 'required',
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
        } else {
            $imagePath = null; 
        }


        // $user = Auth::user();
        // dd($user);
        $post = new Post();
        $post->user_id = Auth::id();
        $post->image = $imagePath; 
        $post->text = $request->text;
        $post->save();
        return redirect()->route('posts.index')->with('imagePath', $imagePath)->with('success', 'Post added successfully');
    }



    /**
     * Store a newly created resource in storage.
     */
    // public function storeAuth(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif',
    //         'text' => 'required',
    //     ]);

        
    //     $post = new Post();

    //      $user = Auth::user();
    //     //  dd($user);
    //     // dd($user->id);
    //      $user->isActive = true;
    //     $user->user_id = $user->id;
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('post_images', 'public');
    //         $post->image = $imagePath;
    //     }        $post->text = $request->text;
    //     $post->save();
    //     return redirect()->route('posts.index')->with('success', 'Posts added successfully');
    // }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
