<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        $category = Category::select('id', 'tenloai')->get();
        return view('user.contact', compact('category'));
    }
}
