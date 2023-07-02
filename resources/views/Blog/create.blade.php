<!-- resources/views/blog/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create New Blog Post</h1>

    <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div>
            <label for="content">Content:</label>
            <textarea name="content" id="content" rows="4" required></textarea>
        </div>
        
		<div>
           <label for="image">Image:</label>
           <input type="file" name="image" id="image">
	    </div>

        <button type="submit">Create Post</button>
    </form>
@endsection
