<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\news;
use App\Models\Product;

use Illuminate\Http\Request;

class Pagenewscontroller extends Controller
{
    public function news()
    {
        $tintuc = News::select('id', 'Tieude', 'Noidung', 'image', 'created_at')->where('trangthai', 1)->paginate(4);
        $product = Product::where('danhmuc', 1)->where('trangthai', 1)->paginate(6);
        $category = Category::select('id', 'tenloai')->where('trangthai', 1)->get();
        return view('user.news', compact('category', 'tintuc', 'product'));
    }
    public function news_detail(Request $request, $id)
    {
        $category = Category::select('id', 'tenloai')->where('trangthai', 1)->get();
        $product = Product::where('danhmuc', 1)->where('trangthai', 1)->paginate(6);
        $chitiettintuc = news::where('id', $id)->where('trangthai', 1)->paginate(1);
        return view('user.news_detail', compact('chitiettintuc', 'category', 'product'));
    }
}
