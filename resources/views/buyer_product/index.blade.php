@extends('layouts.app')

@section('title', '商品一覧 - Cytech EC')

@section('content')
    <h2>商品一覧ページ</h2>
    
    <ul>
        @forelse($products as $product)
            <li>
                {{ $product->product_name }} ({{ number_format($product->price) }}円)
            </li>
        @empty
            <li>現在出品されている商品はありません。</li>
        @endforelse
    </ul>
@endsection