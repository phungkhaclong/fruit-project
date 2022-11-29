<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::select('id', 'tenloai')->where('trangthai', 1)->get();
        $product = Product::paginate(12);
        $productsale = Product::where('danhmuc', 2)->where('trangthai', 1)->paginate(12);
        $productnew = Product::where('danhmuc', 3)->where('trangthai', 1)->paginate(12);
        $tintuc = News::select('id', 'Tieude', 'Noidung', 'image', 'created_at')->where('trangthai', 1)->paginate(3);
        return view('user.home', compact('category', 'product', 'tintuc', 'productsale', 'productnew'));
    }
}
