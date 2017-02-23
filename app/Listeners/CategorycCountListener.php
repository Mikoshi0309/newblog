<?php

namespace App\Listeners;

use App\Events\CategorycCount;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CategorycCountListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CategorycCount  $event
     * @return void
     */
    public function handle(CategorycCount $event)
    {
        $event->category->increment('count');
//        $category = $event->category;
//        $category->count = $category->count + 1;
//        $category->save();
    }
}
