<?php
namespace app\admin\controller;

use \think\Controller;
use \think\Db;

class PublicController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->controller = strtolower(request()->controller());
        $this->action = strtolower(request()->action());
        $this->isLogin();
        $this->permissionAuth();
    }
    /**
     * 判断是否登录
     */
    protected function isLogin()
    {
        if ($this->checkLogin()) {
            if ($this->controller == 'index' && $this->action == 'index') {
                $this->redirect('/admin/index/main');
                exit;
            }
        } else {
            if ($this->controller == 'index') {
                if ($this->action != 'index') {
                    $this->redirect('/admin/index/index');
                    exit;
                }
            } else {
                $this->redirect('/admin/index/index');
                exit;
            }
        }
    }
    protected function setLoginSession($data)
    {
        session('admin_userName', $data['manager_name']);
        session('admin_userId', $data['id']);
        session('admin_group', $data['manager_group']);
    }
    /**
     * 判断session是否存在
     */
    protected function checkLogin()
    {
        if (session('?admin_userName') && session('?admin_userId')) {
            return true;
        } else {
            return false;
        }
    }
    protected function clearSession()
    {
        session(null);
    }

    /**
     * 判断是否有权限
     */
    private function permissionAuth()
    {
        if ($this->controller == 'index') {
            return true;
        }
        if (session('admin_group') != '0') {
            $temp = true;
            $permissionObj = model('Permission');
            $permissonInfo = $permissionObj->where('controller', $this->controller)->where('action', $this->action)->find();
            if ($permissonInfo) {
                if (intval($permissonInfo['type'] == 1)) {
                    $permissionGroupObj = model('PermissionGroup');
                    $permissionGroupDescObj = model('PermissionGroupDesc');
                    $permissionGroupInfo = $permissionGroupObj->where('id', session('admin_group'))->where('status', 1)->find();
                    $permissionGroupDescInfo = $permissionGroupDescObj->where('group_id', session('admin_group'))->where('permission_id', $permissonInfo['id'])->find();
                    if (!$permissionGroupInfo || !$permissionGroupDescInfo) {
                        $temp = false;
                    }
                }
            } else {
                $temp = false;
            }
            if (!$temp) {
                $this->error('没有权限');
            }
        }
    }
}
