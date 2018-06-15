<?php
namespace app\admin\controller;

use app\admin\controller\PublicController;
use lib\PublicClass;

class Index extends PublicController
{
    public function index(PublicClass $publicClass)
    {
        if (request()->isAjax()) {
            $manager = model('Manager');
            $username = request()->param('username');
            $password = request()->param('password');
            $userInfo = $manager->where('manager_name', $username)->find();
            if (!$userInfo || !$publicClass->passwordEncrypt($password, $userInfo['manager_password_str'], $userInfo['manager_password'])) {
                echo json_encode(array('code' => 0));
                exit;
            }
            $this->setLoginSession($userInfo);
            echo json_encode(array('code' => 1));
            exit;
        } else {
            return $this->fetch("index/index");
        }
    }
    public function login(PublicClass $publicClass)
    {
        $manager = model('Manager');
        $username = request()->param('username');
        $password = request()->param('password');
        $userInfo = $manager->where('manager_name', $username)->find();
        if (!$userInfo || !$publicClass->passwordEncrypt($password, $userInfo['manager_password_str'], $userInfo['manager_password'])) {
            echo json_encode(array('code' => 0));
            exit;
        }
        $this->setLoginSession($userInfo);
        echo json_encode(array('code' => 1));
        exit;
    }
    public function main()
    {
        $permissionObj = model('Permission');
        if (session('admin_group') == '0') {
            $permissionList = $permissionObj->getListInLeft();
        } else {
            $permissionGroupDescObj = model('PermissionGroupDesc');
            $permissionGroupDescInfo = $permissionGroupDescObj->where('group_id', session('admin_group'))->column('permission_id');
            $permissionList = $permissionObj->getListInLeft(session('admin_group'), $permissionGroupDescInfo);
        }
        $this->assign('permissionList', $permissionList);
        return $this->fetch("index/main");
    }
    public function logout()
    {
        $this->clearSession();
        $this->redirect('/admin/index/index');
    }
}
