<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class AdminController extends Controller
{
    public function index(){
        if (Auth::check()) { 
            $usertype = Auth::user()->usertype; 
    
            if ($usertype == 'user') {
                return view('home.home');
            } else if ($usertype == 'admin') {
                return view('admin.admin-home');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure it is an image file with size limit
            'name' => 'nullable|string|max:255',
            'user_id' => 'nullable|integer',
            'usertype' => 'nullable|string|max:255',
            'post_status' => 'nullable|string|max:255'
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image', 'public');
        }
    
        $validatedData['user_id'] = Auth::user()->id;
    
        // Create a new post using the validated data
        $store = Post::create($validatedData);
    
        return redirect('/home')->with('Success', 'Post Berhasil Dibuat');
    }
    
    
    
}
