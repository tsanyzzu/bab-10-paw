@extends('layouts.app')

@section('content')
<h1>{{ $post->title }}</h1>
<div class="post-meta">Oleh: {{ $post->author }} | {{ $post->created_at->format('d M Y H:i') }}</div>
<br>
<div class="post-content">{{ $post->content }}</div>

<br>
<div class="post-actions">
    <a href="{{ route('posts.index') }}" class="btn">Kembali ke Daftar</a>
    @auth
        <a href="{{ route('posts.edit', $post) }}" class="btn">Edit</a>
        <form style="display: inline;" method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Yakin ingin menghapus post ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    @endauth
</div>
@endsection