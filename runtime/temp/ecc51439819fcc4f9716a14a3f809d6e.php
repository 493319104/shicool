<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"E:\phpStudy\PHPTutorial\WWW\shicool/application/admin\view\index\main.html";i:1526618464;s:75:"E:\phpStudy\PHPTutorial\WWW\shicool\application\admin\view\public\menu.html";i:1526631511;s:75:"E:\phpStudy\PHPTutorial\WWW\shicool\application\admin\view\public\left.html";i:1527043239;}*/ ?>
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
<body class="layui-layout-body">

    <div class="layui-layout layui-layout-admin">

        <div class="layui-header">
    <div class="layui-logo">layui 后台布局</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
        <li class="layui-nav-item"><a href="">控制台</a></li>
        <li class="layui-nav-item"><a href="">商品管理</a></li>
        <li class="layui-nav-item"><a href="">用户</a></li>
        <li class="layui-nav-item">
            <a href="javascript:;">其它系统</a>
            <dl class="layui-nav-child">
                <dd><a href="">邮件管理</a></dd>
                <dd><a href="">消息管理</a></dd>
                <dd><a href="">授权管理</a></dd>
            </dl>
        </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item">
            <a href="javascript:;"><?php echo \think\Session::get('admin_userName'); ?></a>
            <dl class="layui-nav-child">
                <dd><a href="">基本资料</a></dd>
                <dd><a href="">安全设置</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item"><a href="/admin/index/logout">退出</a></li>
    </ul>
</div>
        <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="layui-nav layui-nav-tree"  lay-filter="test">
            <?php foreach($permissionList as $val): ?>
            <li class="layui-nav-item layui-nav-itemed">
                <a href="javascript:;"><?php echo $val['permission']; ?></a>
                <?php if(!empty($val['child'])): ?>
                <dl class="layui-nav-child">
                    <?php foreach($val['child'] as $valc): ?>
                    <dd><a class="site-active" href="javascript:;" data-url="/admin/<?php echo $valc['controller']; ?>/<?php echo $valc['action']; ?>" data-id="<?php echo $valc['id']; ?>"><?php echo $valc['permission']; ?></a></dd>
                    <?php endforeach; ?>
                </dl>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

        <div class="layui-body beg-layout-body">
            <div class="layui-tab layui-tab-brief layout-nav-card" lay-filter="layout-tab" lay-allowclose="true" style="border: 0; margin: 0;box-shadow: none; height: 100%;min-width:980px;">
                <ul class="layui-tab-title">
                    <li class="layui-this" style="display: none;">
                        <a href="javascript:;">
                            <i class="fa fa-dashboard" aria-hidden="true"></i>
                            <cite>控制面板</cite>
                        </a>
                    </li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <iframe src=""></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-footer beg-layout-footer">
            <p>Copyright @ <?php echo date("Y", time()); ?> All Rights Reserved.粤ICP备88888号</p>
        </div>
    </div>
<script src="/public/static/js/admin/tab.js"></script>

</body>
</html>