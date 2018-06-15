<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"E:\phpStudy\PHPTutorial\WWW\shicool/application/admin\view\index\permission.html";i:1526874711;s:75:"E:\phpStudy\PHPTutorial\WWW\shicool\application\admin\view\public\base.html";i:1526873430;}*/ ?>
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

    
<div class="layui-form-item">
    <button class="layui-btn" onclick="location.href='/admin/index/permissionAddView'">添加权限</button>
</div>
<table class="layui-table">
    <colgroup>
        <col width="150">
        <col width="200">
        <col>
    </colgroup>
    <thead>
    <tr>
        <th>昵称</th>
        <th>加入时间</th>
        <th>签名</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>贤心</td>
        <td>2016-11-29</td>
        <td>人生就像是一场修行</td>
    </tr>
    <tr>
        <td>许闲心</td>
        <td>2016-11-28</td>
        <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
    </tr>
    </tbody>
</table>


</div>
</body>
</html>