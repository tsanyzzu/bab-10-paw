@extends('layouts.app')

@section('content')
<h1>Buat Post Baru</h1>

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div class="form-group">
        <label for="title">Judul:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required>
    </div>
    
    <div class="form-group">
        <label for="author">Penulis:</label>
        <input type="text" name="author" id="author" value="{{ old('author') }}" required>
    </div>
    
    <div class="form-group">
        <label for="content">Konten:</label>
        <textarea name="content" id="content" required>{{ old('content') }}</textarea>
    </div>
    
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('posts.index') }}" class="btn">Batal</a>
</form>
@endsection