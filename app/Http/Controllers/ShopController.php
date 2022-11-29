<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\News;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop()
    {
        $category = Category::select('id', 'tenloai')->get();
        $product = Product::where('trangthai', 1)->paginate(8);
        $productsale = Product::where('danhmuc', 2)->where('trangthai', 1)->paginate(12);
        $productnew = Product::where('danhmuc', 3)->where('trangthai', 1)->paginate(6);
        return view('user.shop', compact('category', 'product', 'productsale', 'productnew'));
    }
}
