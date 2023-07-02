<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogController extends Controller
{
public function create()
{
    return view('blog.create');
}

public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
    }

    // Create a new blog post
    $post = new BlogPost;
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->image = $imageName ?? null;
    $post->save();

    // Flash a success message
    return redirect()->route('blog.index')->with('success', 'New blog post created successfully.');
}


    public function show($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('blog.show', compact('post'));
    }

public function index()
{
    // Fetch blog posts from the database
    $posts = BlogPost::orderBy('created_at', 'desc')->get();

    return view('blog.index', ['posts' => $posts]);
}
public function edit($id)
{
    // Retrieve the blog post based on the provided ID
    $post = BlogPost::find($id);

    // Check if the blog post exists
    if (!$post) {
        // Redirect or show an error message
    }

    // Pass the blog post to the edit view
    return view('blog.edit', ['post' => $post]);
}

public function update($id, Request $request)
{
    // Retrieve the blog post based on the provided ID
    $post = BlogPost::find($id);

    // Check if the blog post exists
    if (!$post) {
        // Redirect or show an error message
    }

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        
        // Assign the image name to the blog post
        $post->image = $imageName;
    }

    // Update the blog post with the new data
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->save();

    // Flash a success message
    return redirect()->route('blog.index')->with('success', 'Blog post updated successfully.');
}

public function destroy($id)
{
    $post = BlogPost::findOrFail($id);
    $post->delete();

    // Flash a success message
    session()->flash('success', 'Blog post deleted successfully.');

    // Redirect to the index page or return a response
    return redirect()->route('blog.index');
}

}
