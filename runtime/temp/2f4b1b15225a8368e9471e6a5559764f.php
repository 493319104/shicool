<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"E:\phpStudy\PHPTutorial\WWW\shicool/application/admin\view\material\material.html";i:1528111247;s:75:"E:\phpStudy\PHPTutorial\WWW\shicool\application\admin\view\public\base.html";i:1528111392;}*/ ?>
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

    
<script src="/public/static/js/admin/material.js"></script>
<script src="/public/static/js/jquery.form.js"></script>
<?php if($act == 'material'): ?>
<div class="layui-form-item">
    <button class="layui-btn" onclick="location.href='/admin/material/materialAddView'">添加素材</button>
</div>
<table class="layui-table">
    <thead>
    <tr>
        <th>素材分类名称</th>
        <th>是否发布</th>
        <th>创建时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($materialList as $val): ?>
    <tr>
        <td><?php echo $val['category_name']; ?></td>
        <td><?php echo $val['status']==1?"已审核" : "未审核"; ?></td>
        <td><?php echo date('Y-m-d H:i:s', $val['createtime']); ?></td>
        <td><a href="/admin/material/categoryAddView?id=<?php echo $val['id']; ?>">编辑</a></td>
    </tr>
    <?php endforeach; if($materialList->render() != ''): ?>
    <tr><td colspan="5"><?php echo $materialList->render(); ?></td></tr>
    <?php endif; ?>
    </tbody>
</table>
<?php else: ?>
<div class="layui-form">
    <input type="hidden" name="id" value="<?php echo isset($categoryInfo['id'])?$categoryInfo['id']: ''; ?>"/>
    <div class="layui-form-item">
        <label class="layui-form-label">作品名称</label>
        <div class="layui-input-inline">
            <input type="text" name="materialName" autocomplete="off" class="layui-input" value="<?php echo isset($categoryInfo['category_name'])?$categoryInfo['category_name']: ''; ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">作品分类</label>
        <div class="layui-input-inline">
            <select name="category">
                <?php echo $categoryTree; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">作品种类</label>
        <div class="layui-input-inline">
            <select name="type" lay-filter="type">
                <option value="1" >视频</option>
                <option value="2" >音频</option>
                <option value="3" >模板</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">会员</label>
        <div class="layui-input-inline">
            <select name="category">
                <?php foreach($userList as $val): ?>
                <option value="<?php echo $val['id']; ?>"><?php echo $val['nickname']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">作品简介</label>
        <div class="layui-input-inline">
            <textarea name="desc" rows="4" cols="50" class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">上传作品</label>
        <div class="layui-input-block">
            <!--<form class="uploadform" action="/admin/material/uploadFile" method="post" enctype="multipart/form-data">-->
                <!--<input type="file" name="uploadfile" class="uploadfile"/>-->
                <!--<input type="submit" value="上传" class="uploadsubmit">-->
            <!--</form>-->
            <button class="layui-btn" id="selectfiles">选择文件</button>
            <button class="layui-btn" id="postfiles">开始上传</button>
        </div>
    </div>
    <!--<div class="layui-form-item">-->
        <!--<label class="layui-form-label"></label>-->
        <!--<div class="layui-input-inline">-->
            <!--<div style="margin-top: 15px; width:300px">-->
                <!--<div class="progress">-->
                    <!--<div class="bar"></div >-->
                    <!--<div class="percent">0%</div >-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
    <div style="width: 100%;" id="ossfile"></div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo" onclick="$.material.materialAdd();">提交</button>
        </div>
    </div>
</div>
<script>
    layui.use([ 'element'], function(){
        var element = layui.element;
    });
    // $(function(){
    //     var bar = $('.bar');
    //     var percent = $('.percent');
    //     var status = $('#status');
    //     $('.uploadform').ajaxForm({
    //         beforeSerialize:function(){
    //         },
    //         beforeSubmit:function(){
    //             var filesize = $("input[type='file']")[0].files[0].size/1024/1024;
    //             if(filesize > 500){
    //                 alert("文件大小超过限制，最多50M");
    //                 return false;
    //             }
    //         },
    //         beforeSend: function() {
    //             status.empty();
    //             var percentVal = '0%';
    //             bar.width(percentVal)
    //             percent.html(percentVal);
    //         },
    //         uploadProgress: function(event, position, total, percentComplete) {
    //             //上传的过程
    //             //position 已上传了多少
    //             //total 总大小
    //             //已上传的百分数
    //             var percentVal = percentComplete + '%';
    //             bar.width(percentVal)
    //             percent.html(percentVal);
    //         },
    //         success: function(data) {
    //             var percentVal = '100%';
    //             bar.width(percentVal)
    //             percent.html(percentVal);
    //         },
    //         error:function(err){
    //             alert("表单提交异常！"+err.msg);
    //         },
    //         complete: function(xhr) {
    //             status.html(xhr.responseText);
    //         }
    //     });
    //
    // });
</script>
<script type="text/javascript" src="/public/plupload-2.1.2/js/plupload.full.min.js"></script>
<script type="text/javascript" src="/public/static/js/admin/upload.js"></script>
<?php endif; ?>

</div>
</body>
</html>