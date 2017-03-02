<?php
namespace App\Observers;


use App\Http\Model\Article;

class ArticleObserver{

    protected $getCache;
    //监听article创建、更新操作删除缓存
    function saved(Article $article){
        cache()->tags('article')->flush();
    }

}