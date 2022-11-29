<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Session;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->cannot('comment_list')) {
            return view('admin.errous.403');
        }
        $binhluan = Comment::orderBy('created_at', 'DESC')->search()->paginate(10);
        return view('admin.comment.index', compact('binhluan'));
    }
    public function destroy(Request $request, $id)
    {
        if ($request->user()->cannot('comment_delete')) {
            return view('admin.errous.403');
        }
        $binhluan = Comment::find($id);
        if ($binhluan->trangthai == 0) {
            $binhluan->trangthai = 1;
        } else $binhluan->trangthai = 0;
        if ($binhluan->update())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('comment.index');
    }
}
