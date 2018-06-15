<?php
namespace app\common\model;

use think\Model;

class User extends Model{

    //表名
    protected $name = 'user';
    //开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    //定义时间戳字段
    protected $createTime = 'false';
    protected $updateTime = false;

    public function getSexAttr($value)
    {
        $status = [0=>'女',1=>'男'];
        return $status[$value];
    }

    public function getUserCategoryAttr($value){
        $status = [0=>'普通会员',1=>'VIP会员'];
        return $status[$value];
    }

}