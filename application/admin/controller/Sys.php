<?php
namespace app\admin\controller;

use app\admin\controller\PublicController;
use lib\PublicClass;

class Sys extends PublicController
{
    /*
     * 权限列表
     */
    public function permissionList()
    {
        $permissionObj = model('Permission');
        $permissionList = $permissionObj->order('id desc')->paginate(15);
        $this->assign('permissionList', $permissionList);
        return $this->fetch("sys/permission");
    }
    public function permissionAddView()
    {
        $permissionObj = model('Permission');
        $id = request()->param('id');
        $pid = 0;
        if (intval($id) > 0) {
            $permissionInfo = $permissionObj->where('id', $id)->find();
            $pid = $permissionInfo['pid'];
            $this->assign('permissionInfo', $permissionInfo);
        }
        $this->assign('permissionTree', $permissionObj->permissionTree($pid));
        return $this->fetch("sys/permission_add");
    }
    public function permissionAdd()
    {
        $id = request()->param('id');
        $permissionName = request()->param('permissionName');
        $controller = strtolower(request()->param('controller'));
        $action = strtolower(request()->param('action'));
        $type = request()->param('type');
        $status = request()->param('status');
        $pid = request()->param('pid');
        $permissionObj = model('Permission');
        if (intval($id) > 0) {
            $res = $permissionObj->save([
                'pid' => $pid,
                'permission' => $permissionName,
                'type' => $type,
                'status' => $status,
                'controller' => $controller,
                'action' => $action,
            ], ['id' => $id]);
        } else {
            $permissionObj->data([
                'pid' => $pid,
                'permission' => $permissionName,
                'type' => $type,
                'status' => $status,
                'controller' => $controller,
                'action' => $action,
            ]);
            $res = $permissionObj->save();
        }
        if ($res || $res==0) {
            echo json_encode(array('code' => 1));
            exit;
        } else {
            echo json_encode(array('code' => -1));
            exit;
        }
    }
    /**
     *添加管理员
     */
    public function manager()
    {
        $managerList = \think\Db::name('manager')->alias('m')->join('permission_group pg', 'pg.id = m.manager_group', 'LEFT')->field('m.id,
        pg.group_name,m.manager_name,m.create_time,m.status')->order('m.id desc')->paginate(15);
        $this->assign('managerList', $managerList);
        $this->assign('act', 'manager');
        return $this->fetch("sys/manager");
    }
    public function addManagerView()
    {
        $permissionGroupObj = model('PermissionGroup');
        if (session('admin_group') > 0) {//非超级管理员
            $permissionGroupList = collection($permissionGroupObj->where('id', session('admin_group'))->select())->toArray();
        } else {
            $permissionGroupList = collection($permissionGroupObj->select())->toArray();
        }
        $this->assign('permissionGroupList', $permissionGroupList);
        $this->assign('act', 'managerAdd');
        return $this->fetch("sys/manager");
    }
    public function addManager(PublicClass $publicClass)
    {
        $manager = model('Manager');
        $username = request()->param('username');
        $password = request()->param('password');
        $manager_group = request()->param('group');
        $status = request()->param('status');
        $userNameRes = $publicClass->userNameEncrypt($username);
        if ($userNameRes['code'] == 0) {
            echo json_encode($userNameRes);
            exit;
        }
        $userInfo = $manager->where('manager_name', $username)->find();
        if ($userInfo) {
            echo json_encode(array('code' => 0, 'codeinfo' => '该用户名已存在'));
            exit;
        }
        $passwordRes = $publicClass->createPassword($password);
        if ($passwordRes['code'] == 0) {
            echo json_encode($passwordRes);
            exit;
        }
        $manager->data([
            'manager_name' => $username,
            'manager_password' => $passwordRes['password'],
            'manager_password_str' => $passwordRes['password_str'],
            'manager_group' => $manager_group,
            'status' => $status,
            'create_time' => time()
        ]);
        $res = $manager->save();
        if ($res || $res==0) {
            echo json_encode(array('code' => 1));
            exit;
        } else {
            echo json_encode(array('code' => -1));
            exit;
        }
    }
    /**
     * 权限组
     */
    public function permissionGroup()
    {
        $permissionGroupObj = model('PermissionGroup');
        $permissionGroupList = $permissionGroupObj->paginate(15);
        $this->assign('permissionGroupList', $permissionGroupList);
        $this->assign('act', 'permissionList');
        return $this->fetch("sys/permission_group");
    }
    public function permissionGroupAddView()
    {
        $id = request()->param('id');
        $groupDescList = array();
        if (intval($id) > 0) {
            $permissionGroupObj = model('PermissionGroup');
            $permissionGroupInfo = $permissionGroupObj->where('id', $id)->find();
            $this->assign('permissionGroupInfo', $permissionGroupInfo);
            $permissionGroupDescObj = model('PermissionGroupDesc');
            $groupDescList = $permissionGroupDescObj->getPermissionDescByGroupId($id);
        }
        $this->assign('groupDescList', $groupDescList);
        $this->assign('act', 'permissionAdd');
        $permissionObj = model('Permission');
        $this->assign('permissionList', $permissionObj->permissionListForGroup());
        return $this->fetch("sys/permission_group");
    }
    public function permissionGroupAdd()
    {
        $permissionGroupName = request()->param('permissionGroupName');
        $status = request()->param('status');
        $permissionArray = request()->post('permissionArray/a');
        $id = intval(request()->param('id'));
        $permissionGroupObj = model('PermissionGroup');
        $permissionGroupDescObj = model('PermissionGroupDesc');
        if ($id > 0) {//修改
            $permissionGroupObj->save([
                'group_name' => $permissionGroupName,
                'status' => $status,
            ], ['id' => $id]);
            //旧权限id、一维数组
            $groupDescList = $permissionGroupDescObj->getPermissionDescByGroupId($id);
            //需要添加的权限
            $insertArray = array();
            foreach ($permissionArray as $val) {
                if (!in_array($val, $groupDescList)) {
                    $insertArray[] = array(
                        'group_id' => $id,
                        'permission_id' => $val,
                    );
                } else {
                    unset($groupDescList[array_search($val, $groupDescList)]);
                }
            }
            $permissionGroupDescObj->saveAll($insertArray);
            //删除旧的并未选中的权限
            if (!empty($groupDescList)) {
                $permissionGroupDescObj->where('group_id', $id)->where("permission_id in (" . implode(',', $groupDescList) . ")")->delete();
            }
        } else {//添加
            $permissionGroupObj->data([
                'group_name' => $permissionGroupName,
                'status' => $status,
                'createtime' => time(),
            ]);
            $permissionGroupObj->save();
            $groupId = $permissionGroupObj->id;
            if ($groupId) {
                $insertArray = array();
                foreach ($permissionArray as $val) {
                    $insertArray[] = array(
                        'group_id' => $groupId,
                        'permission_id' => $val,
                    );
                }
                $permissionGroupDescObj->saveAll($insertArray);
            } else {
                echo json_encode(array('code' => -1));
                exit;
            }
        }
        echo json_encode(array('code' => 1));
    }
}