<?php
namespace App\Http\Repository;


use App\Http\Model\Article;
use App\Http\Model\Category;

class CategoryRepository extends Repository
{

    public static $tag = 'category';
    protected $categoryCacheTime = 60;

    public function pageCategory($id,$page=5){
        $cate_article = $this->remember('category.id.'.$id.'.page.'.$page.'.'.request()->get('page',1),function () use($id,$page){
            return  Category::GetArticleByCategory($id,$page);
        });
        return $cate_article;
    }

    public function categoryList(){
        $data = Category::select('id','name','count')->orderBy('count','desc')->take(5)->get()->filter(function ($item){
            return $item->count > 0;
        });
        $category = $this->remember('categoryList',function () use($data){
            return $data;
        });
        return $category;
    }

    public function tag(){
        return self::$tag;
    }

    public function setTime($min){
        $this->cacheTime = $min;
    }
}