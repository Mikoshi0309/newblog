<?php

namespace App\Providers;

use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Repository\ArticleRepository;
use App\Http\Repository\CategoryRepository;
use App\Observers\ArticleObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $categoryRepository;
    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        parent::__construct($app);
        $this->categoryRepository = new CategoryRepository;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $category = Category::select('id','name','count')->orderBy('count','desc')->take(5)->get()->filter(function ($item){
//            return $item->count > 0;
//        });
        $category = $this->categoryRepository->categoryList();
        $hot_article = Article::orderBy('view_count','desc')->take(5)->get();
        view()->share('share_category',$category);
        view()->share('share_hot_article',$hot_article);

        //Article::observe(ArticleObserver::class);
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
