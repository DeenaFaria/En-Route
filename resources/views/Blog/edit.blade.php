@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Blog Post</h1>

        <form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control">{{ $post->content }}</textarea>
            </div>
			
			<div>
               <label for="image">Image:</label>
               <input type="file" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
