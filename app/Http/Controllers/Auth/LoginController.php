<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Config;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    //新浪微博登录字段
    static $web_akey;
    static $web_skey;
    static $wb_callback_url;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        self::$web_akey = Config::get('sina.wb_akey');
        self::$web_skey = Config::get('sina.wb_skey');
        self::$wb_callback_url = Config::get('sina.wb_callback_url');
        $this->middleware('guest', ['except' => 'logout']);
    }
}
