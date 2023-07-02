@extends('layouts.app')

@section('content')
    <center><h1>Blogs</h1>
<br><br>
@foreach ($posts as $post)
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>
    @if ($post->image)
        <img src="{{ asset('images/' . $post->image) }}" alt="Blog Post Image" height="300" width="500">
    @endif


<p>Created at: {{ $post->created_at }}</p>
<p>Updated at: {{ $post->updated_at }}</p>
<form action="{{ route('blog.edit', ['id' => $post->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
<br>
<form action="{{ route('blog.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-secondary">Delete</button>
</form>
<br><br>

    @endforeach
	</center>
@endsection
