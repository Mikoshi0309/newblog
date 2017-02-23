<?php

namespace App\Providers;

use App\Http\Model\Article;
use App\Observers\AddCategoryCountObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
//        'App\Events\SomeEvent' => [
//            'App\Listeners\EventListener',
//        ],
        'App\Events\CategorycCount' => [
            'App\Listeners\CategorycCountListener',
        ],
        'App\Events\ArticleView' => [
            'App\Listeners\ArticleViewListener'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //Article::observe(new AddCategoryCountObserver);
    }
}
