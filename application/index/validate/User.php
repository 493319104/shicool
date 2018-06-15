<?php
/**
 * Created by PhpStorm.
 * User: Tiger
 * Date: 2018/6/6
 * Time: 18:59
 */
namespace app\index\validate;

use think\Validate;

class User extends Validate{
    protected $rule = [
        'username'  => 'require|number|/^1[34578][0-9]{9}$/',                   //手机号码
        'password'  => 'require|alphaNum|length:6,20',
        '__token__' => 'token'
    ];

    protected $msg = [
        'username.require' => '手机号码必须',
        'username.number' => '手机号码必须是数字',
        'username./^1[34578][0-9]{9}$/' => '手机格式不正确！',
        'password.require' => '用户密码必须',
        'password.alphaNum' => '用户密码必须是字母和数字',
        'password.length'=> '用户密码长度6到20位'
    ];


    protected $scene = [
        'login'   =>  ['username','password'],
        'token'   =>  ['__token__']
    ];
}