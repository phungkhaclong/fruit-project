<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;

use Session;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->cannot('Order_list')) {
            return view('admin.errous.403');
        }
        $hoadon = Order::orderBy('created_at', 'DESC')->search()->paginate(15);
        return view('admin.order.index', compact('hoadon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        if ($request->user()->cannot('Order_update')) {
            return view('admin.errous.403');
        }
        $hoadons = Order::find($id);
        return view('admin.order.edit', compact('hoadons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->user()->cannot('Order_update')) {
            return view('admin.errous.403');
        }
        $hoadon = Order::find($id);
        $data = $request->validate([
            'hoten' => 'required',
            'sdt' => 'required',
            'diachi' => 'required',
            'trangthai' => 'required',
        ]);

        $hoadon->hoten = $request->hoten;
        $hoadon->diachi = $request->diachi;
        $hoadon->sdt = $request->sdt;
        $hoadon->trangthai = $request->trangthai;
        $hoadon->save();

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if ($request->user()->cannot('Order_delete')) {
            return view('admin.errous.403');
        }
        $hoadon = Order::find($id);
        if ($hoadon->trangthai == 'Đã hủy') {
            $hoadon->trangthai = 'Đã đặt';
        } else
            $hoadon->trangthai = 'Đã hủy';
        if ($hoadon->update())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('order.index');
    }
    public function orderdetail($id)
    {
        $hoadons = Order::find($id);
        $chitiethoadons = Orderdetail::where('id_hoadon', $id)->get();
        return view('admin.order.orderdetail', compact('hoadons', 'chitiethoadons',));
    }
}
