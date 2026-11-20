<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create()
    {
        return view('seller_product.create');
    }
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'required|string|max:255',
            'image' => 'required',
        ]);

        //DB保存
        $product = new Product();
        $product->user_id = auth()->id();
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        
        //画像保存
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->img_path = $path;
        }

        $product->save();

        //登録完了後のリダイレクト
        return redirect()->route('mypage');
    }

    public function detail($id)
    {
        $product = Product::find($id);
        return view('buyer_product.detail', compact('product'));
    }

    public function index()
    {
        //DBから商品を取得
        $products = Product::all();
        
        return view('buyer_product.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product || $product->user_id !== auth()->id()) {
        abort(403);
    }
        return view('seller_product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('seller_product.edit', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product || $product->user_id !== auth()->id()) {
        abort(403);
        }

        $product->delete();

        return redirect()->route('mypage')->with('success', '商品を削除しました。');
    }
}