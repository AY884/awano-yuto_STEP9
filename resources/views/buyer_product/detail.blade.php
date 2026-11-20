@extends('layouts.app')

@section('title', '商品詳細 - Cytech EC')

@section('content')
    <div class="container">
        <h2>商品詳細</h2>
        
        <p>商品名：{{ $product->product_name }}</p>
        <p>説明：{{ $product->description }}</p>
        
        <div>
            <p>画像：</p>
            @if($product->img_path)
                <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->product_name }}" style="max-width: 300px;">
            @endif
        </div>
        
        <p>金額：¥{{ number_format($product->price) }}</p>
        {{-- 会社名表示の例（リレーションやカラム名に合わせて調整してください） --}}
        <p>会社：{{ $product->user->name ?? 'TNG' }}</p>
        
        <div style="margin-top: 20px;">
            {{-- カートに追加するボタン（必要に応じてform等にする） --}}
            <button type="button" class="btn btn-primary">カートに追加する</button>
            
            {{-- 戻るボタン --}}
            <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>
        </div>
    </div>
@endsection