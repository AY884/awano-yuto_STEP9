@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-width: 600px;">
    <h2 class="mb-4">商品登録</h2>

    <!--エラー表示-->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!--商品登録-->
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!--商品名-->
        <div class="mb-3">
            <label for="product_name" class="form-label">商品名</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name') }}" required>
        </div>

        <!--価格-->
        <div class="mb-3">
            <label for="price" class="form-label">価格</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
        </div>

        <!--商品説明-->
        <div class="mb-3">
            <label for="description" class="form-label">商品説明</label>
            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
        </div>

        <!--在庫数-->
        <div class="mb-3">
            <label for="stock" class="form-label">在庫数</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" required>
        </div>

        <!--商品画像-->
        <div class="mb-3">
            <label for="image" class="form-label">商品画像</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <!--ボタン-->
        <div class="d-flex gap-2 mt-4">
            <a href="{{ route('mypage') }}" class="btn btn-secondary">戻る</a>
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </form>
</div>
@endsection