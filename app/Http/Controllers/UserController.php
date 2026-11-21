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
    
//アカウント編集
    public function edit()
    {
        $user = Auth::user();

        return view('user.account_edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'name_kanji' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ],
        [
            'required' => ':attributeは必須です。',
            'email'    => ':attributeは正しいメールアドレス形式で入力してください。',
            'max'      => ':attributeは:max文字以内で入力してください。',
            'unique'   => 'この:attributeはすでに使われています。',
        ],
        [
            'username'   => 'ユーザ名',
            'email'      => 'Eメール',
            'name_kanji' => '名前',
            'name_kana'  => 'カナ',
        ]);

        $user->update($validated);

        return redirect()->route('mypage')->with('success', 'アカウント情報を更新しました。');
    }

}