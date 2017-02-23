<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;

class Article extends Model
{
    protected $guarded = ['tags','file'];

    const selectField = [
        'id',
        'title',
        'user_id',
        'cate_id',
        'description',
        'content',
        'created_at',
        'view_count',
        'comment_count'
    ];
    const selectSimpleField = [
        'id',
        'title',
        'description',
        'imageurl',
        'created_at',
        'user_id',
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class,'article_tag')->select(array('id', 'name'));
    }

    public function category(){
        return $this->belongsTo('App\Http\Model\Category','cate_id')->select(array('id', 'name'));
    }

    public function user(){
        return $this->belongsTo('App\User')->select(array('id', 'name'));
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    protected static function uploadimg($field){
        $pic = Request::file($field);

        if($pic->isValid()){
            $dir = date('Ymd',time());
            if(Storage::exists($dir)){
                Storage::makeDirectory($dir);
            }
            $newname = $dir.'/'.md5(rand(1,1000).$pic->getClientOriginalName()).'.'.$pic->getClientOriginalExtension();
            Storage::put($newname,file_get_contents($pic->getRealPath()));
            if(Storage::exists($newname)){
                return [
                    'status'=>0,
                    'message'=>$newname
                ];
            }else{
                return [
                    'status'=>1,
                    'message'=>$pic->getErrorMessage()
                ];
            }

        }else{
            return [
                'status'=>1,
                'message'=>$pic->getErrorMessage()
            ];
        }
    }
   //利用scope优雅的统计数量
    protected function scopeStatus($query){
        return $query->where('status',1);
    }
}
