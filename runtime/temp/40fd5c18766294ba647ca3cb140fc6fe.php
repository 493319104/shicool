<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"E:\phpStudy\PHPTutorial\WWW\shicool/application/admin\view\index\permission_add.html";i:1526874798;s:75:"E:\phpStudy\PHPTutorial\WWW\shicool\application\admin\view\public\base.html";i:1526873430;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
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

    
<div class="layui-form">
    <input type="hidden" name="id" value=""/>
    <div class="layui-form-item">
        <label class="layui-form-label">权限名称</label>
        <div class="layui-input-inline">
            <input type="text" name="permissionName" required lay-verify="required" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">控制器</label>
        <div class="layui-input-inline">
            <input type="password" name="controller" required lay-verify="required" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">方法</label>
        <div class="layui-input-inline">
            <input type="password" name="action" required lay-verify="required" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">父级</label>
        <div class="layui-input-inline">
            <select name="pid">
                <option value="0">顶级权限</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否需要认证</label>
        <div class="layui-input-inline">
            <select name="type" lay-verify="required">
                <option value="1">是</option>
                <option value="0">否</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否发布</label>
        <div class="layui-input-inline">
            <select name="status" lay-verify="required">
                <option value="1">是</option>
                <option value="0">否</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo" onclick="$.index.permissionAdd();">提交</button>
        </div>
    </div>
</div>

</div>
</body>
</html>