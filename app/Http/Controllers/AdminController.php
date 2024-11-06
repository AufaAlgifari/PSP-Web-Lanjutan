<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) { 
            $usertype = Auth::user()->usertype; 
    
            if ($usertype == 'user') {
                return view('home.home');
            } else if ($usertype == 'admin') {
                $posts = Post::all(); 
                return view('admin.admin-home', compact('posts'));
            }
        }
        return redirect()->route('login');
    }

    public function homepage(){
        return view('home.home');
    }

    public function post_page(){
        return view('admin.post_page');
    }
    public function add_post(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'name' => 'nullable|string|max:255',
            'user_id' => 'nullable|integer',
            'usertype' => 'nullable|string|max:255',
            'post_status' => 'nullable|string|max:255'
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image', 'public');
        }
    
        $validatedData['user_id'] = Auth::user()->id;

        $store = Post::create($validatedData);
    
        return redirect('/home')->with('Success', 'Post Berhasil Dibuat');
    }

    public function edit(Post $post) {
        return view('admin.edit', compact('post'));
    }

    public function update_post(Request $request, Post $post)
{
    // Validasi input
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'name' => 'nullable|string|max:255',
        'user_id' => 'nullable|integer',
        'usertype' => 'nullable|string|max:255',
        'post_status' => 'nullable|string|max:255'
    ]);

    if ($request->hasFile('image')) {
        if ($post->image) {
            Storage::delete('public/' . $post->image);
        }

        $validatedData['image'] = $request->file('image')->store('post-image', 'public');
    }

    $post->update($validatedData);

    return redirect('/home')->with('Success', 'Post Berhasil Diperbarui');
}

    

    public function destroy(Post $post)
    {
        $post->delete();
    
        return redirect('/home')->with('Success', 'Post Berhasil Dihapus');
    }
    
    
    
}
