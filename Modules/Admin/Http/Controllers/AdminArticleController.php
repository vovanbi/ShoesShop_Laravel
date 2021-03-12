<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestArticle;
use App\Models\Article;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class AdminArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::all();
        return view('admin::article.index',compact('articles'));
    }
    public function create()
    {
        return view('admin::article.create');
    }
    public function store(RequestArticle $requestArticle)
    {
        $this->insertOrUpdate($requestArticle);
        return redirect()->back();
    }
    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin::article.update',compact('article'));

    }
    public function update(RequestArticle $requestArticle,$id)
    {
        $this->insertOrUpdate($requestArticle,$id);
        return redirect()->back();
    }
    public function insertOrUpdate($requestArticle,$id = '')
    {
        $article= new Article();
        if($id) $article= Article::find($id);
        $article->a_name = $requestArticle->a_name;
        $article->a_slug = Str::slug($requestArticle->a_name);
        $article->a_content = $requestArticle->a_content;
        $article->a_title_seo = $requestArticle->a_title_seo ? $requestArticle->a_title_seo : $requestArticle->a_name;
        $article->a_description_seo =  $requestArticle->a_description_seo ? $requestArticle->a_description_seo : $requestArticle->a_name;

        if($requestArticle->hasFile('avatar'))
        {
            $file = upload_image('avatar');
            if(isset($file['name']))
            {
                $article->a_avatar = $file['name'];
            }
        }

        $article->save();
    }
    public function action($action,$id)
    {
        if($action)
        {
            $article = Article::find($id);
            switch ($action)
            {
                case 'delete':
                    $article->delete();
                    break;
                case 'active':
                    $article->a_active = $article->a_active ? 0 : 1;
                    $article->save();
                    break;
                case 'hot':
                    $article->a_hot = $article->a_hot ? 0 : 1;
                    $article->save();
                    break;
            }

        }
        return redirect()->back();
    }
}
