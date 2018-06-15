<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"E:\phpStudy\PHPTutorial\WWW\shicool/application/admin\view\index\test2.html";i:1526638501;s:75:"E:\phpStudy\PHPTutorial\WWW\shicool\application\admin\view\public\base.html";i:1526637744;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="/public/layui/css/layui.css" rel="stylesheet" type="text/css">
    <script src="/public/layui/layui.js"></script>
    <link href="/public/static/css/layout.css" rel="stylesheet" type="text/css">
    <link href="/public/static/css/admin/main.css" rel="stylesheet" type="text/css">
    <script src="/public/static/js/jquery-3.3.1.js"></script>
    <title>视库网后台管理</title>
</head>
<body>
<div class="conment-div">

    
<div class="layui-form-item">
    <label class="layui-form-label">用户名</label>
    <div class="layui-input-inline">
        <input type="text" name="username" required lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux">3-15位数字、字母或下划线组合</div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">密码</label>
    <div class="layui-input-inline">
        <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux">6-20位数字、字母</div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">密码</label>
    <div class="layui-input-inline">
        <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux">6-20位数字、字母</div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">密码</label>
    <div class="layui-input-inline">
        <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux">6-20位数字、字母</div>
</div>
<div class="layui-form-item">
    <div class="layui-input-block">
        <button class="layui-btn" lay-submit lay-filter="formDemo" onclick="$.user.addManager();">提交</button>
    </div>
</div>

</div>
</body>
</html>