<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function shopdetail(Request $request, $id)
    {
        $category = Category::select('id', 'tenloai')->where('trangthai', 1)->get();
        $product = Product::orderBy('created_at', 'DESC')->where('trangthai', 1)->paginate(1);
        $prolienquan = Product::orderBy('created_at', 'DESC')->where('trangthai', 1)->paginate(4);
        $binhluan = Comment::where('id_sanpham', $id)->where('trangthai', 1)->get();
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $data = (new Product)->find($id);
        if ($data) {
            $data = $data->toArray();
        } else {
            $data = [$id];
        }
        // dd($data);
        return view('user.shopdetail', compact('category', 'product', 'data', 'prolienquan', 'binhluan', 'date'));
    }
    public function postComment(Request $request)
    {
        $this->validate(
            $request,
            [
                'noidung' => 'required'
            ],
            [
                'noidung.required' => "Vui lòng nhập nội dung"
            ]
        );
        $binhluan = new Comment();
        $binhluan->id_user = $request->id_user;
        $binhluan->name = $request->name;
        $binhluan->id_sanpham = $request->id_sanpham;
        $binhluan->noidung = $request->noidung;
        $binhluan->trangthai = $request->trangthai;
        $binhluan->ngaydang = $request->ngaydang;

        if ($binhluan->save()) {
            $binhluans = Comment::where('id_sanpham', $binhluan->id_sanpham)->get();
            return view('user.comment', compact('binhluans'));
        }
    }
    public function category(Category $category, $id)
    {
        $category = Category::select('id', 'tenloai')->where('trangthai', 1)->get();
        $product = Product::where('MaLoai', $id)->where('trangthai', 1)->get();
        $cat = Category::find($id);
        return view('user.category', compact('category', 'product', 'cat'));
    }
    public function search(Request $request)
    {
        $category = Category::select('id', 'tenloai')->where('trangthai', 1)->get();
        $q = $request->q;
        $kq = Product::where('TenSP', 'like', '%' . $q . '%')->where('trangthai', 1)->get();
        return view('user.search', compact('kq', 'q', 'category'));
    }
}
