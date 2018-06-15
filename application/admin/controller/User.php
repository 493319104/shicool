<?php
namespace app\admin\controller;

use app\admin\controller\PublicController;
use lib\UserClass;

class User extends PublicController
{
    /**
     * 会员分类
     */
    public function category()
    {
        $userCategoryObj = model('UserCategory');
        $categoryList = $userCategoryObj->paginate(15);
        $this->assign('categoryList', $categoryList);
        $this->assign('act', 'category');
        return $this->fetch('user/category');
    }
    public function categoryAddView()
    {
        $id = intval(request()->param('id'));
        $userCategoryObj = model('UserCategory');
        if ($id > 0) {
            $this->assign('categoryInfo', $userCategoryObj->where('id', $id)->find());
        }
        $this->assign('act', 'categoryAdd');
        return $this->fetch('user/category');
    }
    public function categoryAdd()
    {
        $id = intval(request()->param('id'));
        $type= request()->param('type');
        $categoryName = request()->param('categoryName');
        $status = request()->param('status');
        $userCategoryObj = model('UserCategory');
        if ($id > 0) {
            $res = $userCategoryObj->save([
                'type' => $type,
                'user_category_name' => $categoryName,
                'status' => $status,
            ], ['id' => $id]);
        } else {
            $userCategoryObj->data([
                'type' => $type,
                'user_category_name' => $categoryName,
                'status' => $status,
                'createtime' => time()
            ]);
            $res = $userCategoryObj->save();
        }
        if ($res || $res==0) {
            echo json_encode(array('code' => 1));
            exit;
        } else {
            echo json_encode(array('code' => -1));
            exit;
        }
    }
    public function userList()
    {
        $userObj = model('User');
        $userList = $userObj->paginate(15);
        $this->assign('userList', $userList);
        $userCategoryObj = model('UserCategory');
        $this->assign('categoryList', collection($userCategoryObj->select())->toArray());
        $this->assign('act', 'user');
        return $this->fetch('user/user');
    }
    public function userAddView()
    {
        $this->assign('act', 'userAdd');
        return $this->fetch('user/user');
    }
    public function userAdd(UserClass $userClass)
    {
        $user_name = request()->param('userName');
        $nickname = request()->param('nickname');
        $password = request()->param('password');
        $email = request()->param('email');
        $sex = request()->param('sex');
        $data = array(
            'user_name' => $user_name,
            'password' => $password,
            'nickname' => $nickname,
            'email' => $email,
            'sex' => $sex,
            'createtime' => time(),
            'lastlogintime' => time(),
        );
        return $userClass->userAdd($data);
    }
}