<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\phpStudy\PHPTutorial\WWW\shicool/application/index\view\index\login.html";i:1528445642;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="/public/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/public/static/index/css/index.css" />
</head>
    <body>
        <button class="test-btn">测试</button>
        <button class="header-login-open">登录</button>
        <a href="<?php echo url('index/file/upload'); ?>" class="header-upload-open" target="_blank">上传</a>
        <button class="header-session-close">退出</button>
        <a  href="<?php echo url('index/index/index'); ?>" >超链接</a>
        <div class="header-form" style="display: none">
            <button class="layui-btn header-login-close">X</button>
            <h1>用户登录</h1>
            <div class="layui-form" style="margin-top: 20px;">
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <input type="text" name="user-name" required  lay-verify="required" placeholder="请输入手机号码" autocomplete="off" class="layui-input header-form-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <input type="password" name="password" required  lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input header-form-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
                        <button class="layui-btn header-submit-btn" lay-submit lay-filter="formDemo" style="background-color:#FFCC00">登录</button>
                    </div>
                </div>
                <div class="header-form-div">
                    <a href="#" class="header-form-rgr">免费注册</a>
                    <a href="#" class="header-form-pwd">忘记密码？</a>
                    <hr>
                </div>
                <div class="header-form-other">
                    其他方式登录<br>
                    <a href="#"><img src="/public/static/index/images/qq_icon.png"  style="width:30px;"></a>&nbsp;
                    <a href="#"><img src="/public/static/index/images/weibo_icon.png"  style="width:26px;"></a>&nbsp;
                    <a href="#"><img src="/public/static/index/images/wechat_icon.png"  style="width:27px;"></a>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="/public/layui/layui.js"></script>

<script>
    layui.use(['jquery', 'layer'], function(){
        var $ = layui.$;
        var layer = layui.layer;
        //登录框弹出
        $('.header-login-open').click(function(){
            $('.header-form').show();
        });
        //登录框关闭
        $('.header-login-close').click(function(){
            $('.header-form').hide();
        })

        //其他方式登录
        $(function(){
            $('.header-form-other a').each(function(i){
                var title;
                switch (i){
                    case 0:
                        title = 'QQ登录';
                        break;
                    case 1:
                        title = '微博登录';
                        break;
                    case 2:
                        title = '微信登录';
                        break;
                    default:
                        break;
                }
                $(this).on('mouseenter',function(){
                    layer.tips(title, $(this),{
                    tips:[3,'#7E7C7C'],time:1000});
                })
            })
        })

        //监控登录回车事件
        $(document).keyup(function(event){
            if(event.keyCode ==13){
                if(!$('.header-form').is(":hidden")) {
                    $('.header-submit-btn').click();
                }
            }
        });

        //用户登录
        $('.header-submit-btn').click(function(){
            var userName = $("input[name='user-name']").val();
            var password = $("input[name='password']").val();
            var token = $("input[name='__token__']").val();
            var url = '/index/index/login';
            var data = {
                "userName":userName,
                "password":password,
                "token":token
            }
            //验证手机号码和密码格式
            var result = check(userName,password);
            if(!result.status){
                layer.msg(result.msg);
                return false;
            }
            if(isLogin()){
               layer.msg('您已登录，请勿重复登录!');
                return false;
            }
            layer.load();
            $.ajax({
                url:url,
                data:{
                    "userName":userName,
                    "password":password,
                    "token":token
                },
                type:'post',
                async:true,
                dataType:'json',
                success:function(data){
                    layer.closeAll();
                    switch(data.code){
                        case '200':
                            layer.msg('登录成功',{time:1500});
                            setTimeout(function(){
                                $('.header-form').hide();
                                location.reload();
                            },1500);
                            break;
                        case '4001':
                            layer.msg('登录失败,请重新登录!');
                            break;
                        case '4002':
                            layer.msg('手机号码或密码格式不正确!');
                            break;
                        case '4003':
                            layer.msg('手机号码不存在!');
                            break;
                        case '4004':
                            layer.msg('用户密码不正确!');
                            break;
                        default:
                            layer.msg('系统出错，请稍后再试!')
                    }
                },
                error:function(){
                    layer.msg('系统出错，请稍后再试!');
                }
            })
        })


        //退出
        $('.header-session-close').click(function(){
           layer.alert(ajaxRequest('/index/index/logout'));
        })

        //上传框
        $('.header-upload-open').click(function(){
            var status = isLogin();
            if(!status){
                layer.open({
                    type: 1,
                    title:'请先登录',
                    area: ['280px', '210px'],
                    skin:'mybtn',
                    shadeClose: false, //点击遮罩关闭
                    content: "<div style='font-size:18px;text-align:center;padding-top:35px;'>您还没登录</div>",
                    btn: ['登录'],
                    btnAlign: 'c',
                    yes:function(index,layero){
                        layer.close(index);
                        $('.header-form').show();
                    }
                });
                return false;
            }
        })

        //ajax,请求方法
        function ajaxRequest(url,data = {},mode = false){
            var result;
            $.ajax({
                url:url,
                data:data,
                type:'post',
                async:mode,
                dataType:'json',
                success:function(rel){
                    result = rel
                },
                error:function(){
                    result = false;
                }
            })
            return result;
        }
        //判断是否登录
        function isLogin(){
            var url = '/index/index/isLogin';
            return ajaxRequest(url);
        }
        //检查用户输入
        function check(userName, password){
            if(!userName){
                return {'status':false,'msg':'手机号码不能为空!'};
            }
            if(!/^1[34578][0-9]{9}$/.test(userName)){
                return {'status':false,'msg':'手机号码格式不正确!'};
            }
            if(!password){
                return {'status':false,'msg':'用户密码不能为空!'};
            }
            if(!/^[\w]{6,20}$/.test(password)){
                return {'status':false,'msg':'用户密码格式不正确,长度6-20位字母和数字!'};
            }
            return {'status':true,'msg':'正确!'};
        }
    });

</script>
</html>