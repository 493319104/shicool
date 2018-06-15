<?php
namespace app\index\controller;

use think\Request;
use app\index\service\Auth;
use think\Controller;
use think\Session;

class Index extends Controller{


    public function index()
    {
            $title = '首页';
            $status = Session::get('userInfo');
            return view('index/index',compact(['title','status']));
    }

    /**
     * 用户登录
     * @param Request $request
     * @return \think\response\Json|\think\response\View
     */
    public function login(Request $request){
        if($request->isAjax()){
            $userName = $request->post('userName');
            $password = $request->post('password');
            $token = $request->post('token');
            //验证token
            $result = $this->validate(['__token__'=>$token],'User.token');
            if(true !== $result){
                return json(['code'=>'4001','msg'=>'登录失败,请重新登录!']);
            }
            ///验证手机、密码格式
            $data = ['username'  => $userName, 'password'  => $password,];
            $rel = $this->validate($data,'User.login');
            if(true !== $rel){
                return json(['code'=>'4002','msg'=>'手机号码或密码格式不正确!']);
            }
            //调用Auth类进行用户认证
            $auth = Auth::instance();
            $result = $auth->login($userName, $password);
            if(4003 === $result){
                return json(['code'=>'4003','msg'=>'手机号码不存在!']);
            }
            if(4004 === $result){
                return json(['code'=>'4004','msg'=>'用户密码不正确!']);
            }
            if(200 === $result){
                return json(['code'=>'200','msg'=>'登录成功!']);
            }
        }
        $title = '用户登录';
        return view('index/login', compact('title'));
    }

    /**
     * 检测用户登录状态
     * @param Request $request
     * @return bool|\think\response\Json
     *
     */
    public function isLogin(Request $request)
    {
        if ($request->isajax()) {
            $auth = Auth::instance();
            return $auth->isLogin();
        }
    }

    /**
     * 用户退出
     * @param Request $request
     * @return bool
     */
    public function logout(Request $request){
        if($request->isajax()) {
            $auth = Auth::instance();
            return $auth->logout();
        }
    }


}
