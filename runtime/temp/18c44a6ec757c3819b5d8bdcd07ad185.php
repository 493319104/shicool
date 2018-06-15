<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"E:\phpStudy\PHPTutorial\WWW\shicool/application/admin\view\user\user.html";i:1527127061;s:75:"E:\phpStudy\PHPTutorial\WWW\shicool\application\admin\view\public\base.html";i:1526960418;}*/ ?>
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

    
<script src="/public/static/js/admin/user.js"></script>
<?php if($act == 'user'): ?>
<div class="layui-form-item">
    <button class="layui-btn" onclick="location.href='/admin/user/userAddView'">添加会员</button>
</div>
<table class="layui-table">
    <thead>
    <tr>
        <th>手机号码</th>
        <th>昵称</th>
        <th>性别</th>
        <th>邮箱</th>
        <th>分类</th>
        <th>是否认证</th>
        <th>最后登录时间</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($userList as $val): ?>
    <tr>
        <td><?php echo $val['user_name']; ?></td>
        <td><?php echo $val['nickname']; ?></td>
        <td><?php echo $val['sex']==1?"男" : "女"; ?></td>
        <td><?php echo $val['email']; ?></td>
        <td>
        <?php foreach($categoryList as $valc): if($valc['id'] == $val['user_category']): ?>
                <?php echo $valc['user_category_name']; endif; endforeach; ?>
        </td>
        <td><?php echo $val['isauth']==1?"已认证" : "未认证"; ?></td>
        <td><?php echo date('y-m-d H:i:s', $val['lastlogintime']); ?></td>
    </tr>
    <?php endforeach; if($userList->render() != ''): ?>
    <tr><td colspan="5"><?php echo $userList->render(); ?></td></tr>
    <?php endif; ?>
    </tbody>
</table>
<?php else: ?>
<div class="layui-form">
    <div class="layui-form-item">
        <label class="layui-form-label">手机号码</label>
        <div class="layui-input-inline">
            <input type="text" name="userName" autocomplete="off" class="layui-input" value="">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-inline">
            <input type="password" name="password" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">6-20位数字、字母</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">昵称</label>
        <div class="layui-input-inline">
            <input type="text" name="nickname" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">邮箱</label>
        <div class="layui-input-inline">
            <input type="text" name="email" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">性别</label>
        <div class="layui-input-inline">
            <select name="sex">
                <option value="1" >男</option>
                <option value="0" >女</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo" onclick="$.user.userAdd();">提交</button>
        </div>
    </div>
</div>
<?php endif; ?>

</div>
</body>
</html>