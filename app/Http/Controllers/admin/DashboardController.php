<?php

namespace App\Http\Controllers\admin;

use Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $product_count = Product::count();
        $category_count = Category::count();
        $order_count = Order::count();
        $cus_count = User::count();

        $pro_info = Order::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
        $month = Order::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($month as $index => $month) {
            --$month;
            $data[$month] = $pro_info[$index];
        }
        return view('admin.layout.dashboard', ['data' => $data], compact('product_count', 'category_count', 'order_count', 'cus_count',));
    }
}
