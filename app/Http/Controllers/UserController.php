<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Sale;

class UserController extends Controller
{
    /**
     * マイページ表示
     */
    public function Mypage()
    {
        $user = Auth::user();

        // 自分が出品した商品を商品番号（id）の昇順で取得
        $listed_products = Product::where('user_id', $user->id)
            ->orderBy('id', 'asc')
            ->get();

        // 自分が購入した商品を購入日（created_at）の昇順で取得（Productモデルとのリレーション利用）
        $purchased_products = Sale::with('product')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('user.mypage', compact('user', 'listed_products', 'purchased_products'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('account.edit');
    }
}