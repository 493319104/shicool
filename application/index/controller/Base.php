<?php
/**
 * Created by PhpStorm.
 * User: Tiger
 * Date: 2018/6/5
 * Time: 11:31
 */
namespace app\index\controller;
use think\Controller;
use think\Session;

class Base extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function _initialize(){

        if(!Session::has('userInfo')){
            $this->error('您未登录!',url('index/index'));
        }
    }
    /*json化返回数据自定义方法
     * @param $code   状态码
     * @param string $msg 提示信息
     * @param array $data 数据数组
     * @return \think\response\Json
     */
   /* public function response($code, $msg = '', $data = []){
        return json([
            'code' => $code,
            'msg'  => $msg,
            'data' => $data
        ]);
	}*/

}