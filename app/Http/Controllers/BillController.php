<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Orderdetail;
use Session;
use Cart;
use Auth;

use Illuminate\Http\Request;

class BillController extends Controller
{
    public function myBill($id)
    {
        $category = Category::select('id', 'tenloai')->get();
        $hoadons = Order::where('user_id', $id)->orderBy('created_at', 'DESC')->paginate(5);
        return view("user.mybill", compact('category', 'hoadons'));
    }
    public function myDetailBill($id)
    {
        $infoUser = ['id' => Auth::User()->id, 'name' => Auth::User()->name, 'email' => Auth::User()->email];
        $category = Category::select('id', 'tenloai')->get();
        $chitiethoadons = Orderdetail::where('id_hoadon', $id)->get();
        return view("user.myDetailBill", compact('infoUser', 'category', 'chitiethoadons'));
    }
    public function cancelBill($id)
    {
        $infoUser = ['id' => Auth::User()->id, 'name' => Auth::User()->name, 'email' => Auth::User()->email];
        $hoadon = Order::find($id);
        if ($hoadon->trangthai == 'Đã hủy') {
            $hoadon->trangthai = 'Đã đặt';
        } else {
            $hoadon->trangthai = 'Đã hủy';
        }
        if ($hoadon->trangthai == 'Đã xác nhận') {
            $hoadon->trangthai = 'Đã hủy';
        } else {
            return redirect()->back()->with('status', 'Đơn hàng đã được xác nhận');
        }
        $hoadon->update();
        return redirect()->back();
    }
}
