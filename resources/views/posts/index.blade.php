@extends('layouts.app')

@section('content')
<h1>Daftar Posts</h1>

@auth
    <a href="{{ route('posts.create') }}" class="btn btn-success">Buat Post Baru</a>
    <br><br>
@endauth

@if($posts->count() > 0)
    @foreach($posts as $post)
        <div class="post">
            <div class="post-title">{{ $post->title }}</div>
            <div class="post-meta">Oleh: {{ $post->author }} | {{ $post->created_at->format('d M Y H:i') }}</div>
            <div class="post-content">{{ Str::limit($post->content, 200) }}</div>
            <div class="post-actions">
                <a href="{{ route('posts.show', $post) }}" class="btn">Lihat Detail</a>
                @auth
                    <a href="{{ route('posts.edit', $post) }}" class="btn">Edit</a>
                    <form style="display: inline;" method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Yakin ingin menghapus post ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                @endauth
            </div>
        </div>
    @endforeach
@else
    <p>Belum ada post yang tersedia.</p>
@endif
@endsection