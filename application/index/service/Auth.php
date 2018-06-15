<?php
/**
 * Created by PhpStorm.
 * User: Tiger
 * Date: 2018/6/7
 * Time: 18:53
 */
namespace app\index\service;
use think\Session;
use app\common\model\User;

/**
 * 用户认证类
 * Class Auth
 * @package app\index\service
 */
class Auth{
    protected $logined = false;      //登录状态

    protected static $instance;
    //单例模式
    public static function instance(){
        if(!(self::$instance instanceof self)){
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * 用户登录
     * @param $userName 手机号码
     * @param $password 用户密码
     * @param int $keeptime  有效时长
     * @return int
     */
    public function login($userName, $password, $keeptime = 0){
        $userObj = User::get(['user_name' => $userName]);
        if(!$userObj){
            return 4003;
        }
        if(!$this->verifyPassword($password, $userObj->password_str,$userObj->password)){
            return 4004;
        }
        //更新最后登录时间
        $userObj->lastlogintime = time();
        $userObj->save();
        Session::set('userInfo',$userObj->hidden(['password','password_str'])->toArray());
        $this->logined = true;
        return 200;
    }


    /**
     * 检测是否登录
     * @return bool
     */
    public function isLogin(){
        if(true === $this->logined){
            return true;
    }
        if(!Session::has('userInfo')){
            return false;
        }
        return true;
    }

    /**
     * 用户退出
     * @return bool
     */
    public function logout()
    {
        $this->logined = false;
        Session::delete('userInfo');
        return true;
    }

    /**
     * 验证用户密码
     * @param $password    用户提交上来的密码
     * @param $parm        加密参数
     * @param $dbPassword  数据库用户密码
     * @return bool
     */
    public function verifyPassword($password, $parm, $dbPassword){
        $password = md5($password . $parm);
        if($password != $dbPassword){
            return false;
        }
        return true;
    }

    /**
     * 生成加密参数后的用户密码
     * @param $password  用户提交的密码
     * @return array
     */
    public static function createPassword($password){
        $parm = mt_rand(10,99).chr(mt_rand(65,90)).chr(mt_rand(65,90));
        $password = md5($password . $parm);
        return ['password'=> $password,'parm'=>$parm];
    }

}