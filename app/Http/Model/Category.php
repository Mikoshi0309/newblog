<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorys';
    protected $guarded = [];
    public $timestamps = true;
    static $category = [];
    static $catedata = [];
    static $childrenIds = [];
    public $html;

    public function articles(){
        return $this->hasMany(Article::class,'cate_id');
    }

    //获取顶级分类
    public static function getTopCategory(){
        return self::where('cate_id',0)->get();
    }

    //获取分类列表
    public static function getCategoryData(){
        $category = self::all();

        $data = catetree($category);
        return $data;
    }

    //获取树形结构数据
    public static function getCategoryTree(){
        $data = self::getCategoryData();

        foreach($data as $k=>$v){
            self::$catedata[$v->id] = $v->html.$v->name;
        }
        return self::$catedata;
    }

    public static function delCategory($id){
        $re = self::where('id',$id)->delete();
        $pre = self::where('cate_id',$id)->delete();

        $are = Article::where('cate_id',$id)->update(['cate_id'=>0]);
        if($re){
            return true;
        }else{
            return false;
        }
    }

    public static function GetArticleByCategory($id,$page=10){
        $childrenIds= self::GetChildrenIdsList($id);
        $article = Article::select(Article::selectSimpleField)->with('user')->where('cate_id',$id)->orWhereIn('cate_id',$childrenIds)->orderBy('created_at','desc')->paginate($page);
        foreach($article as $v){
            $v->imageurl = '/uploads/'.$v->imageurl;
        }
        return $article;
    }

    public static function GetChildrenIdsList($parentId){
        if(empty(self::$childrenIds[$parentId])){
            self::$childrenIds[$parentId] = self::select('id')->where('cate_id',$parentId)->get();
        }
        return self::$childrenIds[$parentId];
    }
}
