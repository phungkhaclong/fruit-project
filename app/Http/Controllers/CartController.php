<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
// use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{

    public function shopcart()
    {
        $category = Category::select('id', 'tenloai')->get();
        $product = Product::all();
        return view('user.shopcart', compact('category', 'product',));
    }

    public function save_cart(Request $request)
    {
        $productId = $request->product_idhidden;
        $quantity = $request->qty;
        $product_info = Product::where('id', $productId)->first();
        $data['id'] = $product_info->id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->TenSP;
        $data['price'] = $product_info->GiaMoi;
        $data['weight'] = $product_info->GiaMoi;
        $data['options']['image'] = $product_info->Image1;
        Cart::add($data);
        return Redirect()->route('user.shopcart');
    }

    public function delete_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect()->back()->with('status', 'Xóa thành công');;
    }

    public function update_cart(Request $request)
    {
        $rowId = $request->rowId_cart;
        $qty = $request->quantity_cart;
        Cart::update($rowId, $qty);
        return Redirect()->back()->with('status', 'Cập nhập thành công');;
    }
}
