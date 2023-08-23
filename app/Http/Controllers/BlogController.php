<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $posts = Post::with('user')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10);
    
        return view('blog.index', compact('posts'));
    
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image upload
        ]);

        $post = new Post([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
            $post->image = $imagePath;
        }

        $post->user_id = auth()->user()->id; // Assuming authenticated user
        $post->save();

        return redirect()->route('blog.index')->with('success', 'Post created successfully!');
    }
}
