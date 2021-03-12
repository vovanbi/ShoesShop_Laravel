<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminRatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::with('product:id,pro_name','user:id,name')->paginate(10);
        $viewData = [
            'ratings'=>$ratings,
        ];
        return view('admin::rating.index',$viewData);
    }
}
