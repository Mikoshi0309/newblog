<?php
namespace App\Observers;

use App\Http\Model\Category;

class AddCategoryCountObserver{
    function saved($article){
        Category::where('id',$article->cate_id)->increment('count');
    }
}