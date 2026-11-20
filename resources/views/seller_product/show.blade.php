{{-- 出品する商品の詳細（売る側の自分の商品、編集や削除ができる） --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">出品商品詳細</h2>

    <div class="mb-3">
        <p>商品名：{{ $product->product_name }}</p>
        <p>説明：{{ $product->description }}</p>
    </div>

    <div class="mb-4 d-flex align-items-center">
        <span class="me-3">画像：</span>
        @if (!empty($product->img_path))
            <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->product_name }}" style="max-width: 300px; height: auto;">
        @else
            <span>画像はありません</span>
        @endif
    </div>

    <div class="mb-4">
        <p>金額：￥{{ number_format($product->price) }}</p>
    </div>

    <div class="d-flex gap-2">
        {{-- 編集ボタン --}}
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">編集</a>

        {{-- 削除ボタン（確認ダイアログ付き） --}}
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">削除する</button>
        </form>

        {{-- 戻るボタン --}}
        <a href="{{ route('mypage') }}" class="btn btn-secondary">戻る</a>
    </div>
</div>
@endsection