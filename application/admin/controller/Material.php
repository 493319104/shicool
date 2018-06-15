<?php
namespace app\admin\controller;

use app\admin\controller\PublicController;
use lib\OSS;

class Material extends PublicController
{
    /**
     * 素材分类
     */
    public function category()
    {
        $materialCategoryObj = model('MaterialCategory');
        $categoryList = $materialCategoryObj->paginate(15);
        $this->assign('categoryList', $categoryList);
        $this->assign('act', 'category');
        return $this->fetch('material/category');
    }
    public function categoryAddView()
    {
        $id = intval(request()->param('id'));
        $pid = 0;
        $materialCategoryObj = model('MaterialCategory');
        if ($id > 0) {
            $categoryInfo = $materialCategoryObj->where('id', $id)->find();
            $pid = $categoryInfo['pid'];
            $this->assign('categoryInfo', $categoryInfo);
        }
        $this->assign('categoryTree', $materialCategoryObj->categoryTree($pid, $id));
        $this->assign('act', 'categoryAdd');
        return $this->fetch('material/category');
    }
    public function categoryAdd()
    {
        $id = request()->param('id');
        $pid = request()->param('pid');
        $categoryName = request()->param('categoryName');
        $status = request()->param('status');
        $materialCategoryObj = model('MaterialCategory');
        if (intval($id) > 0) {
            $res = $materialCategoryObj->save([
                'pid' => $pid,
                'category_name' => $categoryName,
                'status' => $status,
            ], ['id' => $id]);
        } else {
            $materialCategoryObj->data([
                'pid' => $pid,
                'category_name' => $categoryName,
                'status' => $status,
                'createtime' => time()
            ]);
            $res = $materialCategoryObj->save();
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
     *素材列表
     */
    public function material()
    {
        $materialObj = model('Material');
        $materialList = $materialObj->paginate(15);
        $this->assign('materialList', $materialList);
        $this->assign('act', 'material');
        return $this->fetch('material/material');
    }
    public function materialAddView()
    {
        $materialCategoryObj = model('MaterialCategory');
        $this->assign('categoryTree', $materialCategoryObj->categoryTree());
        $userObj = model('User');
        $this->assign('userList', collection($userObj->field('id, nickname, user_name')->select())->toArray());
            $this->assign('act', 'materialAdd');
        return $this->fetch('material/material');
    }
    public function materialAdd()
    {
        $this->assign('act', 'material');
        return $this->fetch('material/material');
    }
    public function uploadFile()
    {//var_dump($_FILES['uploadfile']);exit;
        $OSS = new OSS();
        $res = $OSS->uploadVideo($_FILES['uploadfile']);
        //$res = $OSS->putObjectByRawApis($_FILES['uploadfile']);
        print_r($res);exit;
        echo json_encode($res);
    }
    public function getPolicy()
    {
        $OSS = new OSS();
        echo json_encode($OSS->getPolicy());
    }
}