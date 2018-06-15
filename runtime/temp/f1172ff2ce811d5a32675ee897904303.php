<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"E:\phpStudy\PHPTutorial\WWW\shicool/application/admin\view\sys\permission_add.html";i:1527065131;s:75:"E:\phpStudy\PHPTutorial\WWW\shicool\application\admin\view\public\base.html";i:1528111392;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link href="/public/layui/css/layui.css" rel="stylesheet" type="text/css">
    <script src="/public/layui/layui.js"></script>
    <link href="/public/static/css/layout.css" rel="stylesheet" type="text/css">
    <link href="/public/static/css/admin/main.css" rel="stylesheet" type="text/css">
    <script src="/public/static/js/jquery-3.3.1.js"></script>
    <script src="/public/static/js/admin/main.js"></script>
    <title>视库网后台管理</title>
</head>
<body>
<div class="conment-div">

    
<script src="/public/static/js/admin/sys.js"></script>
<div class="layui-form">
    <input type="hidden" name="id" value="<?php echo isset($permissionInfo['id'])?$permissionInfo['id']: ''; ?>"/>
    <div class="layui-form-item">
        <label class="layui-form-label">权限名称</label>
        <div class="layui-input-inline">
            <input type="text" name="permissionName" autocomplete="off" class="layui-input" value="<?php echo isset($permissionInfo['permission'])?$permissionInfo['permission']: ''; ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">控制器</label>
        <div class="layui-input-inline">
            <input type="text" name="controller" autocomplete="off" class="layui-input" value="<?php echo isset($permissionInfo['controller'])?$permissionInfo['controller']: ''; ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">方法</label>
        <div class="layui-input-inline">
            <input type="text" name="action" autocomplete="off" class="layui-input" value="<?php echo isset($permissionInfo['action'])?$permissionInfo['action']: ''; ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">父级</label>
        <div class="layui-input-inline">
            <select name="pid">
                <option value="0">顶级权限</option>
                <?php echo $permissionTree; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否需要认证</label>
        <div class="layui-input-inline">
            <select name="type">
                <?php if(isset($permissionInfo['type'])): ?>
                <option value="1" <?php echo $permissionInfo['type']==1?"selected" : ""; ?> >是</option>
                <option value="0" <?php echo $permissionInfo['type']==0?"selected" : ""; ?> >否</option>
                <?php else: ?>
                <option value="1" >是</option>
                <option value="0" >否</option>
                <?php endif; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否发布</label>
        <div class="layui-input-inline">
            <select name="status">
                <?php if(isset($permissionInfo['status'])): ?>
                <option value="1" <?php echo $permissionInfo['status']==1?"selected" : ""; ?> >是</option>
                <option value="0" <?php echo $permissionInfo['status']==0?"selected" : ""; ?> >否</option>
                <?php else: ?>
                <option value="1" >是</option>
                <option value="0" >否</option>
                <?php endif; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo" onclick="$.sys.permissionAdd();">提交</button>
        </div>
    </div>
</div>

</div>
</body>
</html>