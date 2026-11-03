@extends('layouts.app')

@section('content')
<div class="container">
    <h2>マイページ</h2>

    {{-- 上部：ログインユーザ情報 --}}
    <div class="mb-4">
        <a href="{{ route('account.edit') }}" class="btn btn-primary mb-3">アカウント編集</a>
        <div class="row">
            <div class="col-md-6">
                <p>ユーザ名：{{ $user->name }}</p>
                <p>Eメール：{{ $user->email }}</p>
            </div>
            <div class="col-md-6">
                <p>名前：{{ $user->name_kanji }}</p>
                <p>カナ：{{ $user->name_kana }}</p>
            </div>
        </div>
    </div>

    {{-- 中部：出品した商品一覧（商品番号の昇順） --}}
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h4>＜出品商品＞</h4>
            <a href="{{ route('products.create') }}" class="btn btn-primary">新規登録</a>
        </div>
        <table class="table border">
            <thead>
                <tr>
                    <th>商品番号</th>
                    <th>商品名</th>
                    <th>商品説明</th>
                    <th>料金(￥)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($listed_products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('products.exhibitor_detail', $product->id) }}" class="btn btn-success btn-sm">詳細</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">出品している商品はありません。</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- 下部：購入した商品一覧（購入日の昇順） --}}
    <div>
        <h4>＜購入した商品＞</h4>
        <table class="table border">
            <thead>
                <tr>
                    <th>商品名</th>
                    <th>商品説明</th>
                    <th>料金(￥)</th>
                    <th>個数</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($purchased_products as $sale)
                    <tr>
                        <td>{{ $sale->product->product_name ?? '削除された商品' }}</td>
                        <td>{{ $sale->product->description ?? '-' }}</td>
                        <td>{{ $sale->product->price ?? '-' }}</td>
                        <td>{{ $sale->quantity }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">購入履歴はありません。</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection