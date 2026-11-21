<div class="container mt-4">
    <h2>アカウント情報編集</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('account.update') }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="username" class="form-label">ユーザ名</label>
            <input type="text" id="username" name="username" class="form-control"
                value="{{ old('username', $user->username) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Eメール</label>
            <input type="email" id="email" name="email" class="form-control"
                value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">名前</label>
            <input type="text" id="name" name="name" class="form-control"
                value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-3">
            <label for="kana" class="form-label">カナ</label>
            <input type="text" id="kana" name="kana" class="form-control"
                value="{{ old('kana', $user->kana) }}">
        </div>

        <div class="d-flex gap-2 mt-4">
            <a href="{{ route('mypage') }}" class="btn btn-secondary">戻る</a>
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
    </form>
</div>