@extends('layouts.app')

@section('content')
<h1>Edit Post</h1>

<form method="POST" action="{{ route('posts.update', $post) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Judul:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
    </div>
    
    <div class="form-group">
        <label for="author">Penulis:</label>
        <input type="text" name="author" id="author" value="{{ old('author', $post->author) }}" required>
    </div>
    
    <div class="form-group">
        <label for="content">Konten:</label>
        <textarea name="content" id="content" required>{{ old('content', $post->content) }}</textarea>
    </div>
    
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('posts.index') }}" class="btn">Batal</a>
</form>
@endsection