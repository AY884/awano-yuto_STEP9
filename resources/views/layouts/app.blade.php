<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cytech EC')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header class="border-bottom py-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">
                <a href="{{ url('/') }}" class="text-decoration-none text-dark">Cytech EC</a>
            </h1>
            <!-- ログインとマイページ -->
            <nav class="d-flex align-items-center gap-3">
                @auth
                    <a href="{{ url('/') }}" class="text-decoration-none">Home</a>
                    <a href="{{ route('mypage') }}" class="text-decoration-none">マイページ</a>
                    <span class="text-secondary">ログインユーザー：{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="mb-0">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">ログアウト</button>
                    </form>
                @endauth

                @guest
                    <!-- ログインしていない時 -->
                    @if (Route::has('register') && request()->routeIs('login'))
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm">新規登録</a>
                    @elseif (request()->routeIs('register'))
                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">ログイン</a>
                    @else
                        <a href="{{ route('login') }}" class="text-decoration-none">ログイン</a>
                        <a href="{{ route('register') }}" class="text-decoration-none">新規登録</a>
                    @endif
                @endguest
            </nav>
        </div>
    </header>

    <main class="container my-4">
        <!-- 各画面の中身 -->
        @yield('content')
    </main>

    <footer class="border-top py-4 mt-5 bg-light">
        <div class="container text-center">
            <div class="mb-3">
                <a href="{{ route('contact') }}" class="btn btn-primary">お問い合わせ</a>
            </div>
            <div class="mb-3 d-flex justify-content-center gap-3">
                <a href="{{ url('/') }}" class="text-decoration-none">Home</a>
                <a href="{{ route('mypage') }}" class="text-decoration-none">マイページ</a>
            </div>
            <hr class="w-75 mx-auto my-3">
            <p class="text-muted mb-0">&copy; 2024 Company, Inc.</p>
        </div>
    </footer>
</body>
</html>