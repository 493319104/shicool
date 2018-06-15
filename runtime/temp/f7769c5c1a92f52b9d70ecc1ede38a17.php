<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"E:\phpStudy\PHPTutorial\WWW\shicool/application/admin\view\sys\permission_group.html";i:1527065286;s:75:"E:\phpStudy\PHPTutorial\WWW\shicool\application\admin\view\public\base.html";i:1526960418;}*/ ?>
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
<?php if($act == 'permissionList'): ?>
<div class="layui-form-item">
    <button class="layui-btn" onclick="location.href='/admin/sys/permissionGroupAddView'">添加权限组</button>
</div>
<table class="layui-table">
    <thead>
    <tr>
        <th>权限组名称</th>
        <th>是否发布</th>
        <th>创建时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($permissionGroupList as $val): ?>
        <tr>
            <td><?php echo $val['group_name']; ?></td>
            <td><?php echo $val['status']==1?"发布" : "不发布"; ?></td>
            <td><?php echo date('Y-m-d H:i:s', $val['createtime']); ?></td>
            <td><a href="/admin/sys/permissionGroupAddView?id=<?php echo $val['id']; ?>">编辑</a></td>
        </tr>
    <?php endforeach; if($permissionGroupList->render() != ''): ?>
    <tr><td colspan="5"><?php echo $permissionGroupList->render(); ?></td></tr>
    <?php endif; ?>
    </tbody>
</table>
<?php else: ?>
<div class="layui-form">
    <input type="hidden" name="id" value="<?php echo isset($permissionGroupInfo['id'])?$permissionGroupInfo['id']: ''; ?>"/>
    <div class="layui-form-item">
        <label class="layui-form-label">权限组名称</label>
        <div class="layui-input-inline">
            <input type="text" name="permissionGroupName" autocomplete="off" class="layui-input" value="<?php echo isset($permissionGroupInfo['group_name'])?$permissionGroupInfo['group_name']: ''; ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否发布</label>
        <div class="layui-input-inline">
            <select name="status">
                <?php if(isset($permissionGroupInfo['status'])): ?>
                <option value="1" <?php echo $permissionGroupInfo['status']==1?"selected" : ""; ?> >是</option>
                <option value="0" <?php echo $permissionGroupInfo['status']==0?"selected" : ""; ?> >否</option>
                <?php else: ?>
                <option value="1" >是</option>
                <option value="0" >否</option>
                <?php endif; ?>
            </select>
        </div>
    </div>
    <div class=""layui-form-item>
        <label class="layui-form-label" style="text-align: left; padding-left: 0;font-size: 18px;">选择权限:</label>
    </div>
    <table class="layui-table">
        <?php foreach($permissionList as $val): ?>
        <tr>
            <td>
                <div class="layui-form-item">
                    <div class="layui-input-inline">
                        <input type="checkbox" name="permission" title="<?php echo $val['permission']; ?>" value="<?php echo $val['id']; ?>" <?php if(in_array($val['id'],$groupDescList)): ?> checked <?php endif; ?>>
                    </div>
                </div>
            </td>
            <td>
            <?php foreach($val['child'] as $valc): ?>
                <div class="layui-input-inline">
                    <input type="checkbox" name="permission" title="<?php echo $valc['permission']; ?>" value="<?php echo $valc['id']; ?>" <?php if(in_array($valc['id'],$groupDescList)): ?> checked <?php endif; ?>>
                </div>
            <?php endforeach; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit onclick="$.sys.permissionGroupAdd();">提交</button>
        </div>
    </div>
</div>
<?php endif; ?>


</div>
</body>
</html>