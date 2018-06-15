<?php
namespace app\common\model;

use think\Model;

class Permission extends Model
{
    private static $permissionChildTree = array();
    /**
     * 左边导航栏
     */
    public function getListInLeft($groupId = 0, $permissionArray = array())
    {
        if ($groupId != 0 && count($permissionArray) > 0) {
            $permissionList = collection($this->field('id, pid, controller, action, permission')->where('id in (' . implode("," , $permissionArray) . ')')->where('type', 1)->where('status', 1)->where('pid', 0)->select())->toArray();
            foreach ($permissionList as $key => $val) {
                $permissionList[$key]['child'] = collection($this->field('id, pid, controller, action, permission')->where('id in (' . implode("," , $permissionArray) . ')')->where('type', 1)->where('status', 1)->where('pid', $val['id'])->select())->toArray();
            }
        } else {
            $permissionList = collection($this->field('id, pid, controller, action, permission')->where('type', 1)->where('status', 1)->where('pid', 0)->select())->toArray();
            foreach ($permissionList as $key => $val) {
                $permissionList[$key]['child'] = collection($this->field('id, pid, controller, action, permission')->where('type', 1)->where('status', 1)->where('pid', $val['id'])->select())->toArray();
            }
        }

        return $permissionList;
    }
    /**
     * 权限层级显示
     * @param int $id 选中的权限对应的父级id
     * @param int $pid 查询的父级id
     * @param int $num
     * @return string
     */
    public function permissionTree($id = 0, $pid = 0, $num = 0)
    {
        $tree = '';
        $permissionTree = $this->field('id, pid, permission')->where('pid', $pid)->select();
        foreach ($permissionTree as $key => $val) {
            $temp = '';
            for($i = 0; $i < $num; $i++) {
                $temp .= '--';
            }
            $select = '';
            if ($val["id"] == $id) {
                $select = 'selected';
            }
            $tree .= "<option value='" . $val["id"] . "' " . $select . ">" . $temp . $val["permission"] . "</option>";
            $tree .= $this->permissionTree($id, $val["id"], ++$num);
            --$num;
        }
        return $tree;
    }
    /**
     * @param array $oldPermission 旧权限
     * @return array
     */
    public function permissionListForGroup()
    {
        $permissionList = collection($this->field('id, pid, permission')->where('type', 1)->where('status', 1)->where('pid', 0)->select())->toArray();
        foreach ($permissionList as $key => $val) {
            self::$permissionChildTree = array();
            $permissionList[$key]['child'] = $this->permissionListForGroupTree($val['id']);
        }
        return $permissionList;
    }
    private function permissionListForGroupTree($pid)
    {
        $permissionList = collection($this->field('id, pid, permission')->where('type', 1)->where('status', 1)->where('pid', $pid)->select())->toArray();
        foreach ($permissionList as $key => $val) {
            self::$permissionChildTree[] = $val;
            $this->permissionListForGroupTree($val['id']);
        }
        return self::$permissionChildTree;
    }
}