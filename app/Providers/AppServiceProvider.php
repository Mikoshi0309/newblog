<?php

namespace App\Providers;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $category = Category::select('id','name','count')->orderBy('count','desc')->take(5)->get();
        $category = $category->filter(function ($item){
           return $item->count > 0;
        });
        $hot_article = Article::orderBy('view_count','desc')->take(5)->get();
        view()->share('share_category',$category);
        view()->share('share_hot_article',$hot_article);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
