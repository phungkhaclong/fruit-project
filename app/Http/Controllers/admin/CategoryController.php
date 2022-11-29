<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->cannot('Category_list')) {
            return view('admin.errous.403');
        }
        $loaisanpham = Category::orderBy('created_at', 'DESC')->search()->paginate(10);
        return view('admin.category.index', compact('loaisanpham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('Category_add')) {
            return view('admin.errous.403');
        }
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('Category_add')) {
            return view('admin.errous.403');
        }
        $loaisanpham = new Category();
        $this->validate($request, [
            'tenloai' => 'required',
            'trangthai' => 'required',
        ]);
        $loaisanpham->tenloai = $request->tenloai;
        $loaisanpham->trangthai = $request->trangthai;
        if ($loaisanpham->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('category.index');
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
    public function edit(Request $request, $id)
    {
        if ($request->user()->cannot('Category_update')) {
            return view('admin.errous.403');
        }
        $loaisanpham = Category::find($id);
        return view('admin.category.edit', compact('loaisanpham'));
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
        if ($request->user()->cannot('Category_update')) {
            return view('admin.errous.403');
        }
        $loaisanpham = Category::find($id);
        $this->validate($request, [
            'tenloai' => 'required',
            'trangthai' => 'required',

        ]);
        if ($loaisanpham->update($request->all()))
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user()->cannot('Category_delete')) {
            return view('admin.errous.403');
        }
        $loaisanpham = Category::find($id);
        if ($loaisanpham->trangthai == 0) {
            $loaisanpham->trangthai = 1;
        } else
            $loaisanpham->trangthai = 0;
        if ($loaisanpham->update())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('category.index');
    }
    public function category(Category $category, $id)
    {
        $categories = Category::select('id', 'tenloai')->get();
        $product = Product::where('MaLoai', $id)->get();
        return view('user.home', compact('categories', 'product'));
    }
}
