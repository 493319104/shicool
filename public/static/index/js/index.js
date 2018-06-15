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
        //ajax登录请求
        $('.header-submit-btn').click(function(){
			$('.header-submit-btn').attr('disabled',true);
            var userName = $("input[name='user-name']").val();
            var password = $("input[name='password']").val();
            var token = $("input[name='__token__']").val();
            var result = check(userName,password);
            if(!result.status){
                layer.msg(result.msg);
                return false;
            }
            layer.load();
            $.ajax({
                url:'/index/index/login',
                data:{
                    "userName":userName,
                    "password":password,
                    "token":token
                },
                type:'post',
                dataType:'json',
                success:function (data) {
                    layer.closeAll();
                    switch(data.code){
                        case '200':
                            layer.msg('登录成功！',{time:1500});
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
                error:function (data) {
                    layer.closeAll();
                    layer.msg('服务器出错，请稍后再试!');
                }
            });
        })
        //清除Session
        $('.header-session-close').click(function(){
            var token = $("input[name='__token__']").val()
            $.ajax({
                url:'/index/index/logout',
                data:{
                    "token":token
                },
                type:'post',
                dataType:'json',
                success:function(data){
                    layer.msg(data);
                },
                error:function(){
                    layer.msg('ERROR');
                }
            })
        })

        //上传框
        $('.header-upload-open').click(function(){
            var status = isLogin();
            if(!status){
                layer.open({
                    type: 1,
                    title:'请先登录',
                    area: ['280px', '210px'],
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

    });
    //判断是否登录
    function isLogin(){
        var $ = layui.$;
        var token = $("input[name='__token__']").val();
        var logined = true;
        $.ajax({
            url:'/index/index/isLogin',
            data:{
                "token":token
            },
            type:'post',
            async:false,
            dataType:'json',
            success:function(data){
                if(!data){
                    logined = false;
                }
            },
            error:function(){
                logined = false;
            }
        })
        return logined;
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
            return {'status':false,'msg':'用户密码格式不正确!'};
        }
        return {'status':true,'msg':'正确!'};
    }