<?php
namespace lib;

use lib\PublicClass;

class UserClass
{
    public function userAdd($data)
    {
        $userObj = model('User');
        $publicClass = new PublicClass();
        $phoneRes = $publicClass->phoneEncrypt($data['user_name']);
        if ($phoneRes['code'] == 0) {
            return $phoneRes;
        }
        $userByName = $userObj->where('user_name', $data['user_name'])->find();
        if ($userByName) {
            return array('code' => 0, 'codeinfo' => '该手机号码已被注册');
        }
        $passwordRes = $publicClass->createPassword($data['password']);
        if ($passwordRes['code'] == 0) {
            return $passwordRes;
        }
        $data['password'] = $passwordRes['password'];
        $data['password_str'] = $passwordRes['password_str'];
        $emailRes = $publicClass->emailEncrypt($data['email']);
        if ($emailRes['code'] == 0) {
            return $emailRes;
        }
        $userByEmail = $userObj->where('email', $data['email'])->find();
        if ($userByEmail) {
            return array('code' => 0, 'codeinfo' => '该邮箱已被注册');
        }
        $userCategoryObj = model('UserCategory');
        $userCategoryInfo = $userCategoryObj->where('status', 1)->where('type', 1)->find();
        if ($userCategoryInfo) {
            $data['user_category'] = $userCategoryInfo['id'];
        } else {
            $userCategoryInfo = $userCategoryObj->where('status', 1)->order('id desc')->find();
            $data['user_category'] = $userCategoryInfo['id'];
        }

        $userObj->data($data);
        $res = $userObj->save();
        if ($res) {
            return array('code' => 1);
        } else {
            return array('code' => 0, 'codeinfo' => '添加失败');
        }
    }
}