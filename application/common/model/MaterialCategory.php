<?php
namespace app\common\model;

use think\Model;

class MaterialCategory extends Model
{
    /**
     * @param int $id 选中的分类对应的父级id
     * @param int $thisId 选中的分类id
     * @param int $pid
     * @param int $num
     * @return string
     */
    public function categoryTree($id = 0, $thisId = 0, $pid = 0, $num = 0)
    {
        $tree = '';
        $categoryTree = $this->field('id, pid, category_name')->where('pid', $pid)->select();
        foreach ($categoryTree as $key => $val) {
            if ($thisId == $val["id"]) {
                continue;
            }
            $temp = '';
            for($i = 0; $i < $num; $i++) {
                $temp .= '--';
            }
            $select = '';
            if ($val["id"] == $id) {
                $select = 'selected';
            }
            $tree .= "<option value='" . $val["id"] . "' " . $select . ">" . $temp . $val["category_name"] . "</option>";
            $tree .= $this->categoryTree($id, $thisId, $val["id"], ++$num);
            --$num;
        }
        return $tree;
    }
}