<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('categories')->latest()->paginate(1);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'required|string',
            'published_at' => 'nullable|date_format:m-d-Y\TH:i',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories' => 'array|exists:categories,id'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->excerpt = $request->excerpt;
        $post->published_at = $request->published_at ? $request->published_at : null; 
        $post->user_id = Auth::id();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = $request->file('image')->storeAs('images/posts', $imageName, 'public');
            $post->image = $path;
        }

        $post->save();
        $post->categories()->sync($request->categories);

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'required|string',
            'published_at' => 'nullable|date',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories' => 'array|exists:categories,id'
        ]);
    
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->excerpt = $validatedData['excerpt'];
        $post->published_at = $validatedData['published_at'];
    
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
    
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = $request->file('image')->storeAs('images/posts', $imageName, 'public');
            $post->image = $path;
        }
    
        $post->save();
        $post->categories()->sync($request->categories);

    
        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }
    
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
 }
//  public function destroy(Post $post)
//     {
//         if ($post->image) {
//             Storage::disk('public')->delete($post->image);
//         }

//         $post->categories()->detach();
//         $post->delete();

//         return redirect()->route('posts.index')
//             ->with('success', 'Post deleted successfully.');
//     }
// }
