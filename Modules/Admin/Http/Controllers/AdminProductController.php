<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $products= Product::all();
        return view('admin::product.index',compact('products'));
    }
    public function create()
    {
        $categories= $this->getCategories();
        return view('admin::product.create',compact('categories'));
    }
    public function store(RequestProduct $requestProduct)
    {
        $this->insertOrUpdate($requestProduct);
        return redirect()->back()->with('success','Thêm mới thành công');
    }
    public function edit($id)
    {
        $categories= $this->getCategories();
        $product= Product::find($id);
        return view('admin::product.update',compact('product','categories'));
    }
    public function update(RequestProduct $requestProduct,$id)
    {
        $this->insertOrUpdate($requestProduct,$id);
        return redirect()->back()->with('success','Cập nhật thành công');
    }
    public function getCategories()
    {
        return Category::all();
    }
    public function insertOrUpdate($requestProduct,$id='')
    {
        $product= new Product();
        if($id) $product= Product::find($id);
        $product->pro_name = $requestProduct->pro_name;
        $product->pro_slug = Str::slug($requestProduct->pro_name);
        $product->pro_category_id = $requestProduct->pro_category_id;
        $product->pro_price = $requestProduct->pro_price;
        $product->pro_number = $requestProduct->pro_number;
        $product->pro_sale = $requestProduct->pro_sale;
        $product->pro_content = $requestProduct->pro_content;
        $product->pro_description = $requestProduct->pro_description;
        $product->pro_title_seo = $requestProduct->pro_title_seo ? $requestProduct->pro_title_seo : $requestProduct->pro_name;
        $product->pro_description_seo =  $requestProduct->pro_description_seo ? $requestProduct->pro_description_seo : $requestProduct->pro_name;

        if($requestProduct->hasFile('avatar'))
        {
            $file = upload_image('avatar');
            if(isset($file['name']))
            {
                $product->pro_avatar = $file['name'];
            }
        }
        $product->save();
    }
    public function action($action,$id)
    {
        if($action)
        {
            $product = Product::find($id);
            switch ($action)
            {
                case 'active':
                    $product->pro_active = $product->pro_active ? 0 : 1;
                    $product->save();
                    break;
                case 'hot':
                    $product->pro_hot = $product->pro_hot ? 0 : 1;
                    $product->save();
                    break;
                case 'delete':
                    $product->delete();
                    break;
            }

        }
        return redirect()->back();
    }
}
