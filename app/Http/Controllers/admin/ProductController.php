<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->cannot('Product_list')) {
            return view('admin.errous.403');
        }


        $sanphams = Product::orderBy('created_at', 'DESC')->search()->paginate(10);
        return view('admin.product.index', compact('sanphams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('Product_add')) {
            return view('admin.errous.403');
        }
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imageUpload($request)
    {
        if ($request->hasFile('Image1')) {
            if ($request->file('Image1')) {
                $request->validate(['Image1' => 'required|image|mimes:jpeg,jpg,png|max:2048',]);
                $imageName1 = $request->Image1->getClientOriginalName();
                $request->Image1->move('image', $imageName1);
                return $imageName1;
            }
        }
    }
    public function imageUpload2($request)
    {
        if ($request->hasFile('Image2')) {
            if ($request->file('Image2')) {
                $request->validate(['Image2' => 'required|image|mimes:jpeg,jpg,png|max:2048',]);
                $imageName2 = $request->Image2->getClientOriginalName();
                $request->Image2->move('image', $imageName2);
                return $imageName2;
            }
        }
    }
    public function store(Request $request)
    {
        if ($request->user()->cannot('Product_add')) {
            return view('admin.errous.403');
        }
        $sanpham = new Product;
        $this->validate($request, [
            'TenSP' => 'required',
            'MaLoai' => 'required',
            'DanhMuc' => 'required',
            'Gia' => 'required',
            'GiaMoi' => 'required',
            'Image1' => 'required',
            'Image2' => 'required',
            'SoLuong' => 'required',
            'MoTa' => 'required',
            'TrangThai' => 'required',
        ]);
        $sanpham->TenSP = $request->TenSP;
        $sanpham->MaLoai = $request->MaLoai;
        $sanpham->DanhMuc = $request->DanhMuc;
        $sanpham->Gia = $request->Gia;
        $sanpham->GiaMoi = $request->GiaMoi;
        $sanpham->Image1 = $this->imageUpload($request);
        $sanpham->Image2 = $this->imageUpload2($request);
        $sanpham->SoLuong = $request->SoLuong;
        $sanpham->MoTa = $request->MoTa;
        $sanpham->TrangThai = $request->TrangThai;
        //if(Category::create($request->all()))
        if ($sanpham->save()) {
            Session::flash('message', 'successfully!');
        } else
            Session::flash('message', 'Failure!');
        return redirect()->route('product.index');
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
        if ($request->user()->cannot('Product_update')) {
            return view('admin.errous.403');
        }
        // $category = Category::all();
        $sanpham = Product::find($id);
        return view('admin.product.edit', compact('sanpham',));
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
        if ($request->user()->cannot('Product_update')) {
            return view('admin.errous.403');
        }
        $sanpham = Product::find($id);
        $input = $request->input();
        if (!empty($request->Image1)) {
            // Lấy đường dẫn link ảnh vừa lưu
            $input['Image1'] = $this->imageUpload($request);
        }
        if (!empty($request->Image2)) {
            // Lấy đường dẫn link ảnh vừa lưu
            $input['Image2'] = $this->imageUpload2($request);
        }
        $sanpham->fill($input);
        $update = $sanpham->save();
        if ($update) {
            Session::flash('message', 'successfully!');
        } else
            Session::flash('message', 'Failure!');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user()->cannot('Product_delete')) {
            return view('admin.errous.403');
        }
        $sanphams = Product::find($id);
        if ($sanphams->TrangThai == 0) {
            $sanphams->TrangThai = 1;
        } else
            $sanphams->TrangThai = 0;
        if ($sanphams->update())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('product.index');
    }
}
