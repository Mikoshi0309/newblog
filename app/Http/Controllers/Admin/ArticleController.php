<?php

namespace App\Http\Controllers\Admin;

use App\Events\CategorycCount;
use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Tag;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::with('category')->orderBy('created_at', 'desc')->get();
        
        return view('admin.article.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_data = Category::getCategoryTree();
        $tags = Tag::all();
        return view('admin.article.add',compact('category_data','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->except('_token');
//        $rules = [
//            'title' => 'required',
//            'content' => 'required',
//        ];
//        $mess = [
//            'title.required' => "文章标题必须填写",
//            'content.required' => "文章内容必须填写",
//        ];
//        $vali = Validator::make($data,$rules,$mess);
//        if($vali->passes()){
            if($request->hasFile('file')){
                $status = Article::uploadimg('file');
                if(!$status['status']){
                    $data['imageurl'] = $status['message'];
                }else{
                    return redirect('admin/article/create')->withErrors($status['message'],'file')->withInput();
                }
            }

            if(!empty($data['tags'])){
                $ids = [];
                foreach($data['tags'] as $v){
                    $tag = Tag::firstOrCreate(['name'=>$v]);
                    array_push($ids,$tag->id);
                }
            }
            $re = Auth::user()->articles()->create($data);

            if($re){
                Event::fire(new CategorycCount(Category::find($data['cate_id'])));
                if(!empty($ids))
                    $re->tags()->sync($ids);
                return redirect('admin/article');
            }else{
                return redirect('admin/article/create')->withErrors('创建失败','error')->withInput();
            }

//        }else{
//            return redirect('admin/article/create')->withErrors($vali)->withInput();
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_data = Category::getCategoryTree();
        $tags = Tag::all();
        $data = Article::find($id);
        $data['imageurl'] = '/uploads/'.$data['imageurl'];

        return view('admin.article.edit',compact('category_data','tags','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $data = $request->except('_token','_method');
//        $rules = [
//            'title' => 'required',
//            'content' => 'required',
//        ];
//        $mess = [
//            'title.required' => "文章标题必须填写",
//            'content.required' => "文章内容必须填写",
//        ];
//        $vali = Validator::make($data,$rules,$mess);
//        if($vali->passes()){
            if($request->hasFile('file')){
                $status = Article::uploadimg('file');
                if(!$status['status']){
                    $oldimg = Article::find($id);
                    Storage::delete($oldimg->imageurl);
                    $data['imageurl'] = $status['message'];
                }else{
                    return redirect('admin/article/create')->withErrors($status['message'],'file')->withInput();
                }
            }

            if(!empty($data['tags'])){
                $ids = [];
                foreach($data['tags'] as $v){
                    $tag = Tag::firstOrCreate(['name'=>$v]);
                    array_push($ids,$tag->id);
                }

            }
            unset($data['tags'],$data['file']);

            $article = Article::find($id);
            $re = Auth::user()->articles()->where('id',$id)->update($data);
            if($re){

                if(intval($article->cate_id) != intval($data['cate_id'])){
                    Category::where('id',$article->cate_id)->decrement('count');
                    Event::fire(new CategorycCount(Category::find($data['cate_id'])));
                }

                if(!empty($ids))
                    Article::find($id)->tags()->sync($ids);
                return redirect('admin/article');
            }else{
                return redirect('admin/article/'.$id.'/edit')->withErrors('修改失败','error')->withInput();
            }

//        }else{
//            return redirect('admin/article//'.$id.'/edit')->withErrors($vali)->withInput();
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $re = Article::where('id',$id)->delete();
        if($re){
            return $data = [
                'status' => 0,
                'message' => '删除成功'
            ];
        }else{
            return $data = [
                'status' => 1,
                'message' => '删除失败'
            ];
        }
        return $data;
    }
}
