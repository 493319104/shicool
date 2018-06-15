<?php
namespace app\common\model;

use think\Model;

class PermissionGroupDesc extends Model
{
    public function getPermissionDescByGroupId($groupId)
    {
        return $this->where('group_id', $groupId)->column('permission_id');
    }
}