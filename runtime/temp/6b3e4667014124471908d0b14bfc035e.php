<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"E:\phpStudy\PHPTutorial\WWW\shicool/application/admin\view\index\index.html";i:1526635459;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="/public/layui/css/layui.css" rel="stylesheet" type="text/css">
    <script src="/public/layui/layui.js"></script>
    <link href="/public/static/css/admin/main.css" rel="stylesheet" type="text/css">
    <script src="/public/static/js/jquery-3.3.1.js"></script>
    <title>视库网后台管理</title>
</head>
<body>
<div class="login">
    <div class="login-form">
        <header><h1>后台登录</h1></header>
        <div class="login-table">
            <div class="layui-form">
                <div class="layui-form-item">
                    <label class="beg-login-icon">
                        <i class="layui-icon">&#xe612;</i>
                    </label>
                    <input type="text" name="userName" lay-verify="userName" autocomplete="off" placeholder="这里输入用户名" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <label class="beg-login-icon">
                        <i class="layui-icon">&#xe642;</i>
                    </label>
                    <input type="password" name="password" lay-verify="password" autocomplete="off" placeholder="这里输入密码" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <div class="beg-pull-left beg-login-remember">
                        <label>记住帐号？</label>
                        <input type="checkbox" name="rememberMe" value="true" lay-skin="switch" title="记住帐号" style="display: inline-block;">
                    </div>
                    <div class="beg-pull-right">
                        <button class="layui-btn layui-btn-primary login-button">
                            <i class="layui-icon">&#xe650;</i> 登录
                        </button>
                    </div>
                    <div class="beg-clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".login-button").click(function(){
        var username = $("input[name='userName']").val();
        var password = $("input[name='password']").val();
        if (username == '' || password == '') {
            alert('用户名或密码不能为空');
            return false;
        }
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '/admin/index/index',
            data: {
                'username': username,
                'password': password
            },
            success:function(msgs)
            {
                if (msgs.code == 1) {
                    location.href = '/admin/index/main';
                } else {
                    alert('用户名或密码错误');
                }
            },
            error:function(){}
        });
    });
</script>
</body>
</html>