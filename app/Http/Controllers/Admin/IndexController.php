<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        //$article_count = Article::status()->count();  更优雅的是用 scope统计
        $article_count = Article::count();
        $category_count = Category::count();
        $tag_count = Tag::count();
        return view('admin.info',compact('article_count','category_count','tag_count'));
    }
}
