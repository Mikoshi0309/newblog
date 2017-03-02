<?php
namespace App\Observers;

use App\Http\Model\Category;
//暂时无用
class AddCategoryCountObserver{
    function saved($article){
        Category::where('id',$article->cate_id)->increment('count');
    }
}