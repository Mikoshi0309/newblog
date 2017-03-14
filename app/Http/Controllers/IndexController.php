<?php

namespace App\Http\Controllers;

use App\Events\ArticleView;
use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Comment;
use App\Http\Repository\ArticleRepository;
use App\Http\Repository\CategoryRepository;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    protected $articleRepository;
    protected $categoryRepository;
    public function __construct(ArticleRepository $articleRepository,CategoryRepository $categoryRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
     }

    public function index(){
//只获取渴求式加载中的user的name、id
//        $article = Article::with(array('user'=>function($query){
//            $query->select('id','name');
//        }))->paginate(10);//select(Article::selectSimpleField)->

        //$article = Article::select(Article::selectSimpleField)->with('user')->orderBy('created_at','desc')->paginate(5);
        $article = $this->articleRepository->pageArticle(3);
//用each处理后分页消失
//        $article = $article->each(function($val){
//            $val->imageurl = '/uploads/'.$val->imageurl;
//        });
     /************************这里使用了修改器**********************************/
//        foreach($article as $v){
//            $v->imageurl = '/uploads/'.$v->imageurl;
//        }
        return view('index.index',compact('article'));
    }
    public function show($id){
        //$article = Article::select(Article::selectField)->where('id',$id)->with(['user','category','tags','comment'])->get();
        /***********缓存中取数据****************/
        $article = $this->articleRepository->getArticleById($id);
        Event::fire(new ArticleView(Article::find($id)));
        return view('index.blog',compact('article'));
    }


    public function search(Request $request){
        $key = trim($request->key);
        $key = "$key%";
        $cateIds = Category::select('id')->where('name','like',$key)->get();
        $article = Article::where('title','like',$key)
            ->orWhere('description','like',$key)
            ->orWhereIn('cate_id',$cateIds)
            ->select(Article::selectSimpleField)
            ->with('user')
            ->orderBy('view_count','desc')
            ->paginate(10);
//        foreach($article as $v){
//            $v->imageurl = '/uploads/'.$v->imageurl;
//        }
        return view('index.index',compact('article'));
    }

    public function cate_article($id){
        $article = $this->categoryRepository->pageCategory($id);
        return view('index.index',compact('article'));
    }

    public function comment(Request $request){
        $data = $request->except('_token','_method');
        $rules = [
            'user' => 'required',
            'name' => 'required',
            'content' => 'required',
        ];
        $message = [
            'user.required' => '用户名不能为空',
            'name.required' => '标题不能为空',
            'content.required' => '内容不能为空',
        ];
        $vali = Validator::make($data,$rules,$message);
        if($vali->passes()){
            $re = Comment::create($data);
            if($re){
                Article::where('id',$data['article_id'])->increment('comment_count');
                return $data = [
                    'status' => 0,
                    'message' => '发表成功'
                ];
            }else{
                return $data = [
                    'status' => 1,
                    'message' => '发表失败'
                ];
            }
        }return $data = [
            'status' => 1,
            'message' => "请填写内容吧"
        ];
        return $data;
    }

    public function ajaxsearch($str){
        $article = Article::select(['id','title'])->where('title','like',"{$str}%")->get();
        return json_encode(['error' => 0, 'info' => $article]);
    }
}
