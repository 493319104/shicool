<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"E:\phpStudy\PHPTutorial\WWW\shicool/application/admin\view\sys\manager.html";i:1527055330;s:75:"E:\phpStudy\PHPTutorial\WWW\shicool\application\admin\view\public\base.html";i:1526960418;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
<?php if($act == 'manager'): ?>
<div class="layui-form-item">
    <button class="layui-btn" onclick="location.href='/admin/sys/addManagerView'">添加管理员</button>
</div>
<table class="layui-table">
    <thead>
    <tr>
        <th>管理员名称</th>
        <th>是否使用</th>
        <th>所属权限组</th>
        <th>创建日期</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($managerList as $val): ?>
    <tr>
        <td><?php echo $val['manager_name']; ?></td>
        <td><?php echo $val['status']==1?"使用" : "不使用"; ?></td>
        <td><?php if($val['group_name'] == ''): ?>超级管理员<?php else: ?><?php echo $val['group_name']; endif; ?></td>
        <td><?php echo date('Y-m-d H:i:s', $val['create_time']); ?></td>
        <td></td>
        <!--<td><a href="/admin/sys/addManagerView?id=<?php echo $val['id']; ?>">编辑</a></td>-->
    </tr>
    <?php endforeach; if($managerList->render() != ''): ?>
    <tr><td colspan="5"><?php echo $managerList->render(); ?></td></tr>
    <?php endif; ?>
    </tbody>
</table>
<?php elseif($act == 'managerAdd'): ?>
<div class="layui-form">
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-inline">
            <input type="text" name="username" placeholder="请输入用户名" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">3-15位数字、字母或下划线组合</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-inline">
            <input type="password" name="password" placeholder="请输入密码" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">6-20位数字、字母</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否使用</label>
        <div class="layui-input-inline">
            <select name="status">
                <option value="1">是</option>
                <option value="0">否</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">所属权限</label>
        <div class="layui-input-inline">
            <select name="group">
                <?php foreach($permissionGroupList as $val): ?>
                <option value="<?php echo $val['id']; ?>"><?php echo $val['group_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo" onclick="$.sys.addManager();">提交</button>
        </div>
    </div>
</div>
<?php else: endif; ?>

</div>
</body>
</html>