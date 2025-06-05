@extends('layouts.app')

@section('content')
<h1>Login</h1>

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>
    
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
    </div>
    
    <button type="submit" class="btn btn-success">Login</button>
    <a href="{{ route('register') }}" class="btn">Belum punya akun? Register</a>
</form>
@endsection