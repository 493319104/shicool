<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\phpStudy\PHPTutorial\WWW\shicool/application/index\view\file\upload.html";i:1529028648;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="/public/webuploader/webuploader.css" />
</head>
    <body>
        <div id="uploader" class="wu-example">
            <!--用来存放文件信息-->
            <div id="thelist" class="uploader-list"></div>
            <div class="btns">
                <div id="picker">选择文件</div>
                <button id="ctlBtn" class="btn btn-default">开始上传</button>
            </div>
        </div>

    </body>
    <script type="text/javascript" src="/public/static/index/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/public/webuploader/webuploader.min.js"></script>

<script>
    var test1 = '';
    var uploader = new WebUploader.Uploader({
        // swf文件路径
        swf:  '/public/webuploader/Uploader.swf',
        // 文件接收服务端。
        server: '<?php echo url("index/file/test"); ?>',
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#picker',
        chunked:true,
        chunkSize:2*1024*1024,
        // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
        resize: false

    });
    uploader.on('fileQueued',function(file) {
        $('#thelist').append( '<div id="' + file.id + '" class="item">' +
                '<h4 class="info">' + file.name + '</h4>' +
                '<p class="state">' + file.id + '</p>' +
                '</div>' );})
   /* uploader.on( 'uploadProgress', function( file, percentage ) {
        alert(percentage);
    });*/
    $('.btn-default').click(function(){
        uploader.upload();
    });
    uploader.on('uploadSuccess', function(file, response){
        test1 += response._raw;
    })

    uploader.on('uploadFinished', function(file, response){
        console.log(test1);
    })
</script>
</html>