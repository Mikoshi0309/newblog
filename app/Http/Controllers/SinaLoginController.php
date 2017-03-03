<?php

namespace App\Http\Controllers;

use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use libweibo\SaeTClientV2;
use libweibo\SaeTOAuthV2;


class SinaLoginController extends Controller
{

    static $web_akey;
    static $web_skey;
    static $wb_callback_url;

    public function __construct()
    {
        self::$web_akey = Config::get('sina.wb_akey');
        self::$web_skey = Config::get('sina.wb_skey');
        self::$wb_callback_url = Config::get('sina.wb_callback_url');
    }

    public function callback(Request $request){
        $key = $request->only('code');
        $token = Cache::get('sina_token');
        if(!$token){
            $key = $request->only('code');
            $sina_auth = new SaeTOAuthV2( self::$web_akey , self::$web_skey  );
            $key['redirect_uri'] = self::$wb_callback_url;
            try {
                $sina_token = $sina_auth->getAccessToken( 'code', $key ) ;
                $token = $sina_token['access_token'];
                Cache::put('sina_token',$token,$sina_token['expires_in']);
            } catch (\Exception $e) {
            }
        }
        $this->checkexist($token);
        $article_count = Article::count();
        $category_count = Category::count();
        $tag_count = Tag::count();
        return Redirect::to('/admin')->with('article_count',$article_count)->with('category_count',$category_count)->with('tag_count',$tag_count);
        //return view('admin.info',compact('article_count','category_count','tag_count'));
    }


    private function checkexist($token){
        $sina_data = new SaeTClientV2( self::$web_akey, self::$web_skey , $token );
        $uid_get = $sina_data->get_uid();
        $user_data = $sina_data->show_user_by_id( $uid_get['uid']);
        $u_exist_data = User::select(['id','name'])->where('u_from_id',$user_data['id'])->get();
        $u_exist_data = $u_exist_data->flatten()->all();
        if(!$u_exist_data[0]['name']){
            $data['u_from_id'] = $user_data['id'];
            $data['u_from'] = 'sina';
            $data['name'] = $user_data['name'];
            $data['password'] = bcrypt(123456);
            $data['email'] = $user_data['id'].'@test.com';
            $re = User::create($data);
            $id = $re->id;
            if(!$re){
                return redirect('/login');
            }
        }else{
            $id = $u_exist_data[0]['id'];
        }
        Auth::login(User::find($id));
    }
}
