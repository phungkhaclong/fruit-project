<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Orderdetail;
use Session;
use Cart;
use Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $category = Category::select('id', 'tenloai')->get();
        $cartitem = session()->get('cart', []);
        if (Auth::check()) {
            return view('user.checkout', compact('category', 'cartitem'));
        }
        return redirect()->route('user.login')->with('status', 'Vui lòng đăng nhập trước khi thanh toán');
    }

    public function placeorder(Request $request)
    {
        $hoadon = new Order();
        $hoadon->user_id = $request->id_user;
        $hoadon->hoten = $request->hoten;
        $hoadon->email = $request->email;
        $hoadon->sdt = $request->sdt;
        $hoadon->diachi = $request->diachi;
        $hoadon->ghichu = $request->ghichu;
        $hoadon->trangthai = "Đã đặt";
        $hoadon->save();
        $cartitem = session()->get('cart')["default"];
        // dd($cartitem);
        foreach ($cartitem as $item) {
            $chitiethoadon = new Orderdetail();
            $chitiethoadon->id_hoadon =  $hoadon->id;
            $chitiethoadon->id_sanpham =  $item->id;
            $chitiethoadon->SoLuong =  $item->qty;
            $chitiethoadon->TenSP =  $item->name;
            $chitiethoadon->Gia =  $item->price * ($item->qty);
            $chitiethoadon->trangthai = null;
            $chitiethoadon->save();
            $total = Product::select('SoLuong')->where('id', $item->id)->pluck('SoLuong');
            // dd($total);
            $update_total = $total[0] - $item->qty;
            Product::where('id', $item->id)->update(['SoLuong' => $update_total]);
            $request->session()->forget('cart');
        }
        return redirect()->route('user.home')->with('status', 'Đăt hàng thành công');
    }
    
}
