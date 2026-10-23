<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cytech EC')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="container">
            <h1>
                <a href="{{ url('/') }}">Cytech EC</a>
            </h1>
            <!--ログインとマイページ-->
            <nav>
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ route('mypage') }}">マイページ</a>
                
                <span>ログインユーザー：TTUU</span>
                <form action="#" method="POST">
                    @csrf
                    <button type="submit">ログアウト</button>
                </form>
            </nav>
        </div>
    </header>

    <main class="container">
        <!--各画面の中身-->
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div>
                <a href="{{ route('contact') }}">お問い合わせ</a>
            </div>
            <div>
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ route('mypage') }}">マイページ</a>
            </div>
            <p>&copy; 2024 Company, Inc.</p>
        </div>
    </footer>
</body>
</html>