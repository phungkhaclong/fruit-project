<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->cannot('News_list')) {
            return view('admin.errous.403');
        }
        $tintuc = News::orderBy('created_at', 'DESC')->search()->paginate(5);
        return view('admin.news.index', compact('tintuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('News_add')) {
            return view('admin.errous.403');
        }
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imageUpload($request)
    {
        if ($request->hasFile('image_news')) {
            if ($request->file('image_news')) {
                $request->validate(['image_news' => 'required|image|mimes:jpeg,jpg,png|max:2048',]);
                $imagenews = $request->image_news->getClientOriginalName();
                $request->image_news->move('image', $imagenews);
                return $imagenews;
            }
        }
    }
    public function store(Request $request)
    {
        if ($request->user()->cannot('News_add')) {
            return view('admin.errous.403');
        }
        $tintuc = new News;
        $this->validate($request, [
            'Tieude' => 'required',
            'Noidung' => 'required',
            'TrangThai' => 'required',
        ]);
        $tintuc->Tieude = $request->Tieude;
        $tintuc->Noidung = $request->Noidung;
        $tintuc->image = $this->imageUpload($request);
        $tintuc->TrangThai = $request->TrangThai;
        //if(Category::create($request->all()))
        //    dd($tintuc);
        if ($tintuc->save()) {
            Session::flash('message', 'successfully!');
        } else
            Session::flash('message', 'Failure!');


        return redirect()->route('news.index');
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
        if ($request->user()->cannot('News_update')) {
            return view('admin.errous.403');
        }
        $tintuc = News::find($id);
        return view('admin.news.edit', compact('tintuc'));
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
        if ($request->user()->cannot('News_update')) {
            return view('admin.errous.403');
        }
        $tintuc = News::find($id);
        $input = $request->input();
        if (!empty($request->image_news)) {
            // Lấy đường dẫn link ảnh vừa lưu
            $input['image'] = $this->imageUpload($request);
        }

        $tintuc->fill($input);
        $update = $tintuc->save();
        if ($update) {
            Session::flash('message', 'successfully!');
        } else
            Session::flash('message', 'Failure!');
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if ($request->user()->cannot('News_delete')) {
            return view('admin.errous.403');
        }
        $tintuc = News::find($id);
        if ($tintuc->TrangThai == 0) {
            $tintuc->TrangThai = 1;
        } else
            $tintuc->TrangThai = 0;
        if ($tintuc->update())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('news.index');
    }
}
