<?php
namespace App\Http\Repository;

use App\Http\Model\Article;

class ArticleRepository extends Repository
{
    static $tag = 'article';

    public function pageArticle($page=5){
        $article = $this->remember('article.page.'.$page.'.'.request()->get('page',1),function () use($page){
           return  Article::select(Article::selectSimpleField)->with('user')->orderBy('created_at','desc')->paginate($page);
        });
        return $article;
    }

    public function getArticleById($id){
        $article = $this->remember('article.'.$id,function() use($id){
            return Article::select(Article::selectField)->where('id',$id)->with(['user','category','tags','comment'])->get();
        });
        return $article;
    }

    public function tag(){
        return self::$tag;
    }

    
}