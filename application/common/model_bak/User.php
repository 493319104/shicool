<?php
namespace app\common\model;

use think\Model;

class User extends Model{

    //表名
    protected $name = 'user';
    //开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    //定义时间戳字段
    protected $createTime = 'createtime';
    protected $updateTime = false;

    public function getSexAttr($value)
    {
        $status = [0=>'女',1=>'男'];
        return $status[$value];
    }

}