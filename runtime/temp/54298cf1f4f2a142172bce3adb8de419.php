<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"E:\phpStudy\PHPTutorial\WWW\shicool/application/admin\view\sys\permission.html";i:1526981952;s:75:"E:\phpStudy\PHPTutorial\WWW\shicool\application\admin\view\public\base.html";i:1528111392;}*/ ?>
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

    
<div class="layui-form-item">
    <button class="layui-btn" onclick="location.href='/admin/sys/permissionAddView'">添加权限</button>
</div>
<table class="layui-table">
    <thead>
    <tr>
        <th>权限名</th>
        <th>加控制器 / 方法</th>
        <th>是否需要认证</th>
        <th>是否发布</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($permissionList as $val): ?>
    <tr>
        <td><?php echo $val['permission']; ?></td>
        <td><?php echo $val['controller']; ?> / <?php echo $val['action']; ?></td>
        <td><?php echo $val['type']==1?"是" : "否"; ?></td>
        <td><?php echo $val['status']==1?"发布" : "不发布"; ?></td>
        <td><a href="/admin/sys/permissionAddView?id=<?php echo $val['id']; ?>">编辑</a></td>
    </tr>
    <?php endforeach; if($permissionList->render() != ''): ?>
    <tr><td colspan="5"><?php echo $permissionList->render(); ?></td></tr>
    <?php endif; ?>
    </tbody>
</table>


</div>
</body>
</html>