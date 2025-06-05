<!DOCTYPE html>
<html>
<head>
    <title>Laravel CRUD App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .navbar { background: #333; color: white; padding: 10px 20px; margin: -20px -20px 20px -20px; border-radius: 8px 8px 0 0; }
        .navbar a { color: white; text-decoration: none; margin-right: 15px; }
        .navbar a:hover { text-decoration: underline; }
        .btn { display: inline-block; padding: 8px 16px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; }
        .btn:hover { background: #0056b3; }
        .btn-danger { background: #dc3545; }
        .btn-danger:hover { background: #c82333; }
        .btn-success { background: #28a745; }
        .btn-success:hover { background: #1e7e34; }
        .alert { padding: 10px; margin: 10px 0; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-danger { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .form-group textarea { height: 100px; resize: vertical; }
        .post { border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 4px; }
        .post-title { font-size: 18px; font-weight: bold; margin-bottom: 10px; }
        .post-meta { color: #666; font-size: 14px; margin-bottom: 10px; }
        .post-actions { margin-top: 10px; }
        .post-actions a, .post-actions button { margin-right: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <a href="{{ route('posts.index') }}">Home</a>
            @auth
                <a href="{{ route('posts.create') }}">Buat Post</a>
                <span style="float: right;">
                    Halo, {{ Auth::user()->name }}!
                    <form style="display: inline;" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: white; text-decoration: underline; cursor: pointer;">Logout</button>
                    </form>
                </span>
            @else
                <span style="float: right;">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                </span>
            @endauth
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>