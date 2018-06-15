<?php
/**
 * Created by PhpStorm.
 * User: Tiger
 * Date: 2018/6/5
 * Time: 18:24
 */

namespace app\index\controller;
use think\Controller;
use think\Request;
class File extends Base{

    public function index(){

    }

    public function upload(){

        $title = '上传文件';
        return view('file/upload', compact('title'));
    }

    public function test(Request $request){
        $file = $request->file('file');

        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                //echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                //echo $info->getSaveName();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                echo $info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }

    }
}