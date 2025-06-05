@extends('layouts.app')

@section('content')
<h1>Register</h1>

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    </div>
    
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>
    
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
    </div>
    
    <div class="form-group">
        <label for="password_confirmation">Konfirmasi Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div>
    
    <button type="submit" class="btn btn-success">Register</button>
    <a href="{{ route('login') }}" class="btn">Sudah punya akun? Login</a>
</form>
@endsection