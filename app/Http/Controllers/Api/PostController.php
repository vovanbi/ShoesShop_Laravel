<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return Category::all();
    }
    public function store(Request $request)
    {
        $category= new Category();
        $category->c_name = $request->c_name;
        $category->c_slug = Str::slug($request->c_name);
        $category->c_title_seo = $request->c_title_seo ? $request->c_title_seo : $request->c_name;
        $category->c_description_seo = $request->c_description_seo;
        $category->save();
    }
}
