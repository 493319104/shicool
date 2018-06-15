<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\phpStudy\PHPTutorial\WWW\shicool/application/index\view\index\index.html";i:1529032636;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1, user-scalable=no"/>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="/public/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/public/static/index/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/public/static/index/css/header.css" />
    <link rel="stylesheet" type="text/css" href="/public/static/index/css/common.css" />

</head>
    <body>
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <div class="layui-fluid">
            <!--头部顶部-->
            <div class="top layui-row">
                    <div class="layui-col-xs4" id="top-link"><a href="#"><img src="/public/static/index/images/pic-01-10.png">&nbsp;视库网首页</a></div>
                    <?php if(!isset($status)): ?>
                    <div class="layui-col-xs1 layui-col-md-offset3"><a href="#" target="_blank"><a href="#"><img src="/public/static/index/images/pic-02.png">上传</a></div>
                    <div class="layui-col-xs1"><a href="#" target="_blank"><img src="/public/static/index/images/pic-03.png">充值</a></div>
                    <div class="layui-col-xs1"><a href="#" target="_blank"><img src="/public/static/index/images/pic-04.png">帮助</a></div>
                    <div class="layui-col-xs1"><a href="#" target="_blank"><img src="/public/static/index/images/pic-40.png">登录</a></div>
                    <div class="layui-col-xs1" style="border:0;"><a href="#" target="_blank"><img src="/public/static/index/images/pic-41.png">注册</a></div>
                    <?php else: ?>
                    <div class="layui-col-xs1"><a href="#" target="_blank"><a href="#"><img src="/public/static/index/images/pic-02.png">上传</a></div>
                    <div class="layui-col-xs1"><a href="#" target="_blank"><img src="/public/static/index/images/pic-03.png">充值</a></div>
                    <div class="layui-col-xs1"><a href="#" target="_blank"><img src="/public/static/index/images/pic-04.png">帮助</a></div>
                    <div class="layui-col-xs1"><a href="#" target="_blank"><a href="#"><img src="/public/static/index/images/pic-02.png">购物车</a></div>
                    <div class="layui-col-xs1"><a href="#" target="_blank"><img src="/public/static/index/images/pic-41.png">消息</a></div>
                    <div class="layui-col-xs1"><a href="#" target="_blank"><img src="/public/static/index/images/pic-41.png">账户</a></div>
                    <div class="layui-col-xs2" style="border:0;"><a href="#" target="_blank"><img src="#">头像</a></div>
                    <?php endif; ?>
            </div>
            <!--end-->

            <!--头部查询-->
            <div class="search">
                <div class="search-logo"></div>
                <div class="logo-title">让创作更具价值</div>
                <div class="search-form">
                    <form action="#" method="post" class="layui-form">
                        <div class="layui-input-block">
                            <select name="type">
                                <option value="0">视频素材</option>
                                <option value="1">影视模板</option>
                                <option value="1">背景音乐</option>
                                <option value="1">音效</option>
                                <option value="1">创意影片</option>
                            </select>
                        </div>
                        <div class="layui-input-block">
                            <input type="text" name="" placeholder="&nbsp;创作从此开始" autocomplete="off" class="layui-input" id="search-input">
                        </div>
                        <div class="layui-input-block">
                            <input type="image" src="/public/static/index/images/pic-45.png" height="33" width="36" border="0" >
                        </div>
                        <div class="serach-title">影视行业一站式素材库，海量高素质视频素材、模板、创意影片汇集于此</div>
                    </form>
                </div>
            </div>
            <!--end-->

            <!--头部导航-->
            <div class="nav-bgd1">
                <div class="nav-bgd2">
                    <div class="layui-row nav">
                        <div class="layui-col-xs1" style="background:url('');"><a href="#" target="_blank">视频素材</a></div>
                        <div class="layui-col-xs1"><a href="#" target="_blank">影视模板</a></div>
                        <div class="layui-col-xs1"><a href="#" target="_blank">背景音乐</a></div>
                        <div class="layui-col-xs1"><a href="#" target="_blank">音效</a></div>
                        <div class="layui-col-xs1"><a href="#" target="_blank">创意影片</a></div>
                        <div class="layui-col-xs1"><a href="#" target="_blank">创作者交流</a></div>
                        <div class="layui-col-xs1"><a href="#" target="_blank">定制服务</a></div>
                    </div>
                </div>
            </div>
            <!--end-->
            <div  class="page-body">
                <!--轮播图推荐图-->
                <div class="layui-row carousel-album">
                    <div class="layui-col-xs6 layui-carousel" id="carousel">
                        <div carousel-item>
                            <img src="/public/static/index/images/test4.jpg">
                            <img src="/public/static/index/images/test5.jpg">
                            <img src="/public/static/index/images/test3.jpg">
                            <img src="/public/static/index/images/test1.jpg">
                            <img src="/public/static/index/images/test6.jpg">
                        </div>
                    </div>
                    <div class="layui-col-xs5" id="album">
                        <div class="layui-row">
                            <div class="layui-col-xs12 album-top">
                                <div class="album-top-position">
                                    <div class="top-position-outside">
                                        <div class="top-position-inside">
                                            <img src="/public/static/index/images/test1.jpg" class="position-img">
                                            <div class="album-top-mark">
                                                <img src="/public/static/index/images/pic-53.png">
                                            </div>
                                            <div class="album-top-title">
                                                <div>端午节专辑1</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-row layui-col-space15">
                                <div class="layui-col-xs6">
                                    <div class="album-bottom">
                                        <div class="album-bottom-position">
                                            <div  class="bottom-position-outside">
                                                <div  class="bottom-position-inside">
                                                    <img src="/public/static/index/images/test4.jpg" class="position-img">
                                                    <div class="album-bottom-mark">
                                                        <img src="/public/static/index/images/pic-53.png">
                                                    </div>
                                                    <div class="album-buttom-title">
                                                        <div>端午节专辑2</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-col-xs6">
                                    <div class="album-bottom">
                                        <div class="album-bottom-position">
                                            <div  class="bottom-position-outside" style="left:-1.5%">
                                                <div  class="bottom-position-inside">
                                                    <img src="/public/static/index/images/test4.jpg" class="position-img">
                                                    <div class="album-bottom-mark">
                                                        <img src="/public/static/index/images/pic-53.png">
                                                    </div>
                                                    <div class="album-buttom-title">
                                                        <div>端午节专辑3</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end-->
                <!--标题图片-->
                <div  class="title-img"></div>
                <!--end-->
                <!--精选专辑-->
                <div class="layui-row layui-col-space25 choice" >
                    <!--精选专辑左侧-->
                    <div class="layui-col-xs9">
                        <div class="layui-row">
                            <div class="layui-col-xs12 area-title">
                                <span class="area-title-icon"><img src="/public/static/index/images/pic-31.png"></span>
                                <span class='area-title-text1'>精选专辑</span>
                                <span class='area-title-text2'>在这里，鼓励原创和分享精神，我们帮助您实现创作背后的价值</span>
                            </div>
                        </div>
                        <div class="layui-row layui-col-space15 choice-album">
                            <div class="layui-col-xs4">
                                <div class="choice-album-chind">
                                    <div class="album-chind-position">
                                        <div class="chind-position-outside">
                                            <div class="chind-position-inside">
                                                <div class="choice-album-title">
                                                    <div>端午节专辑1</div>
                                                </div>
                                                <img src="/public/static/index/images/test1.jpg" class="position-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs4">
                                <div class="choice-album-chind">
                                    <div class="album-chind-position">
                                        <div class="chind-position-outside">
                                            <div class="chind-position-inside">
                                                <div class="choice-album-title">
                                                    <div>端午节专辑2</div>
                                                </div>
                                                <img src="/public/static/index/images/test2.jpg" class="position-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs4">
                                <div class="choice-album-chind">
                                    <div class="album-chind-position">
                                        <div class="chind-position-outside">
                                            <div class="chind-position-inside">
                                                <div class="choice-album-title">
                                                    <div>端午节专辑3</div>
                                                </div>
                                                <img src="/public/static/index/images/test3.jpg" class="position-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs4">
                                <div class="choice-album-chind">
                                    <div class="album-chind-position">
                                        <div class="chind-position-outside">
                                            <div class="chind-position-inside">
                                                <div class="choice-album-title">
                                                    <div>端午节专辑4</div>
                                                </div>
                                                <img src="/public/static/index/images/test4.jpg" class="position-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs4">
                                <div class="choice-album-chind">
                                    <div class="album-chind-position">
                                        <div class="chind-position-outside">
                                            <div class="chind-position-inside">
                                                <div class="choice-album-title">
                                                    <div>端午节专辑5</div>
                                                </div>
                                                <img src="/public/static/index/images/test5.jpg" class="position-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs4">
                                <div class="choice-album-chind">
                                    <div class="album-chind-position">
                                        <div class="chind-position-outside">
                                            <div class="chind-position-inside">
                                                <div class="choice-album-title">
                                                    <div>端午节专辑6</div>
                                                </div>
                                                <img src="/public/static/index/images/test6.jpg" class="position-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--广告位-->
                    <div class="layui-col-xs3" style="padding: 1.3%;padding-right: 1.3%;">
                        <div class="layui-col-xs12  annouce">
                            <img src="/public/static/index/images/pic-32.png">公告
                        </div>
                       <div class="layui-col-xs12 news">
                            <ul>
                                <li>视库网周年庆</li>
                                <li>视库网周年庆</li>
                                <li>视库网周年庆</li>
                                <li>视库网周年庆</li>
                            </ul>
                        </div>
                        <div class="layui-col-xs12 adver">
                            <img src="/public/static/index/images/pic-17-79.png">
                        </div>
                        <div class="layui-col-xs12 adver">
                            <img src="/public/static/index/images/pic-19.png">
                        </div>
                    </div>
                </div>
                <!--end-->
                <!--作品推荐-->
                <div class="layui row recommend">
                    <div class="layui-col-xs9" style="background-color: #ffffff;padding-left: 5px;padding-right: 5px;height: 466px;">
                        <div class="layui-row title-bgd">
                            <div class="layui-col-xs12 area-title">
                                <span class="area-title-icon"><img src="/public/static/index/images/pic-31.png"></span>
                                <span class='area-title-text1'>作品推荐</span>
                                <span class='area-title-text2'>在这里，鼓励原创和分享精神，我们帮助您实现创作背后的价值</span>
                            </div>
                        </div>
                        <div class="layui-row layui-col-space8">
                            <div class="layui-col-xs3">
                                <div style="height: 122px;position:relative">
                                    <img src="/public/static/index/images/test8.jpg" style="width:100%;height: 100%;">
                                    <div style="position:absolute;bottom:0;height:30px;width:100%;background:rgba(86,90,82,0.6);">
                                        <div style="color:#FFFFFF;font-size:12px;line-height: 30px;width:100%;">
                                            <span>1920X1080</span>
                                            <span>16s</span>
                                            <span><img src="/public/static/index/images/test3.jpg" width="12">20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs3">
                                <div style="height: 122px;position:relative">
                                    <img src="/public/static/index/images/test7.jpg" style="width:100%;height: 100%;">
                                    <div style="position:absolute;bottom:0;height:30px;width:100%;background:rgba(86,90,82,0.6);">
                                        <div style="color:#FFFFFF;font-size:12px;line-height: 30px;">
                                            <span>1920X1080</span>
                                            <span>16s</span>
                                            <span><img src="/public/static/index/images/test3.jpg" width="12">20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs3">
                                <div style="height: 122px;position:relative">
                                    <img src="/public/static/index/images/test6.jpg" style="width:100%;height: 100%;">
                                    <div style="position:absolute;bottom:0;height:30px;width:100%;background:rgba(86,90,82,0.6);">
                                        <div style="color:#FFFFFF;font-size:12px;line-height: 30px;">
                                            <span>1920X1080</span>
                                            <span>16s</span>
                                            <span><img src="/public/static/index/images/test3.jpg" width="12">20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs3">
                                <div style="height: 122px;position:relative">
                                    <img src="/public/static/index/images/test5.jpg" style="width:100%;height: 100%;">
                                    <div style="position:absolute;bottom:0;height:30px;width:100%;background:rgba(86,90,82,0.6);">
                                        <div style="color:#FFFFFF;font-size:12px;line-height: 30px;">
                                            <span>1920X1080</span>
                                            <span>16s</span>
                                            <span><img src="/public/static/index/images/test3.jpg" width="12">20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs3">
                                <div style="height: 122px;position:relative">
                                    <img src="/public/static/index/images/test2.jpg" style="width:100%;height: 100%;">
                                    <div style="position:absolute;bottom:0;height:30px;width:100%;background:rgba(86,90,82,0.6);">
                                        <div style="color:#FFFFFF;font-size:12px;line-height: 30px;">
                                            <span>1920X1080</span>
                                            <span>16s</span>
                                            <span><img src="/public/static/index/images/test3.jpg" width="12">20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs3">
                                <div style="height: 122px;position:relative">
                                    <img src="/public/static/index/images/test6.jpg" style="width:100%;height: 100%;">
                                    <div style="position:absolute;bottom:0;height:30px;width:100%;background:rgba(86,90,82,0.6);">
                                        <div style="color:#FFFFFF;font-size:12px;line-height: 30px;">
                                            <span>1920X1080</span>
                                            <span>16s</span>
                                            <span><img src="/public/static/index/images/test3.jpg" width="12">20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs3">
                                <div style="height: 122px;position:relative">
                                    <img src="/public/static/index/images/test7.jpg" style="width:100%;height: 100%;">
                                    <div style="position:absolute;bottom:0;height:30px;width:100%;background:rgba(86,90,82,0.6);">
                                        <div style="color:#FFFFFF;font-size:12px;line-height: 30px;">
                                            <span>1920X1080</span>
                                            <span>16s</span>
                                            <span><img src="/public/static/index/images/test3.jpg" width="12">20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs3">
                                <div style="height: 122px;position:relative">
                                    <img src="/public/static/index/images/test5.jpg" style="width:100%;height: 100%;">
                                    <div style="position:absolute;bottom:0;height:30px;width:100%;background:rgba(86,90,82,0.6);">
                                        <div style="color:#FFFFFF;font-size:12px;line-height: 30px;">
                                            <span>1920X1080</span>
                                            <span>16s</span>
                                            <span><img src="/public/static/index/images/test3.jpg" width="12">20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs3">
                                <div style="height: 122px;position:relative">
                                    <img src="/public/static/index/images/test4.jpg" style="width:100%;height: 100%;">
                                    <div style="position:absolute;bottom:0;height:30px;width:100%;background:rgba(86,90,82,0.6);">
                                        <div style="color:#FFFFFF;font-size:12px;line-height: 30px;">
                                            <span>1920X1080</span>
                                            <span>16s</span>
                                            <span><img src="/public/static/index/images/test3.jpg" width="12">20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs3">
                                <div style="height: 122px;position:relative">
                                    <img src="/public/static/index/images/test3.jpg" style="width:100%;height: 100%;">
                                    <div style="position:absolute;bottom:0;height:30px;width:100%;background:rgba(86,90,82,0.6);">
                                        <div style="color:#FFFFFF;font-size:12px;line-height: 30px;">
                                            <span>1920X1080</span>
                                            <span>16s</span>
                                            <span><img src="/public/static/index/images/test3.jpg" width="12">20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs3">
                                <div style="height: 122px;position:relative">
                                    <img src="/public/static/index/images/test1.jpg" style="width:100%;height: 100%;">
                                    <div style="position:absolute;bottom:0;height:30px;width:100%;background:rgba(86,90,82,0.6);">
                                        <div style="color:#FFFFFF;font-size:12px;line-height: 30px;">
                                            <span>1920X1080</span>
                                            <span>16s</span>
                                            <span><img src="/public/static/index/images/test3.jpg" width="12">20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-xs3">
                                <div style="height: 122px;position:relative">
                                    <img src="/public/static/index/images/test3.jpg" style="width:100%;height: 100%;">
                                    <div style="position:absolute;bottom:0;height:30px;width:100%;background:rgba(86,90,82,0.6);">
                                        <div style="color:#FFFFFF;font-size:12px;line-height: 30px;">
                                            <span>1920X1080</span>
                                            <span>16s</span>
                                            <span><img src="/public/static/index/images/test3.jpg" width="12">20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-xs3">
                        <div class="layui-col-xs11 layui-col-xs-offset1" style="height: 466px;background: url('/public/static/index/images/pic-54.png')no-repeat;background-size:100% 100%">
                            <div class="layui-col-xs12" style="height: 54px;line-height: 54px;">
                                <img src="/public/static/index/images/pic-33.png" style="margin: -5px 3px 0 5px;">明星创作者
                            </div>
                            <div class="layui-col-xs12" style="height: 34px;">
                                数以百万的创作者选择视库网
                            </div>
                            <div class="layui-col-xs12"  style="height: 378px;background-color:blue;">
                                <div class="layui-col-xs12" style="height: 90px;background-color:yellow;"></div>
                                <div class="layui-col-xs12" style="height: 90px;background-color:#FFCC00;"></div>
                                <div class="layui-col-xs12" style="height: 90px;background-color:#000000;"></div>
                                <div class="layui-col-xs12" style="height: 90px;background-color:#007DDB;"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end-->

            </div>
        </div>
    </body>
<script type="text/javascript" src="/public/layui/layui.js"></script>

<script>
    layui.use('carousel', function(){
        var carousel = layui.carousel;
        //建造实例
        carousel.render({
            elem: '#carousel',
            width:'57.5%',
            height:'432px',
            arrow: 'hover',
            anim: 'fade', //切换动画方式
            interval:'2000'
        });
    });

    layui.use(['jquery', 'layer', 'form'], function(){
        var form = layui.form;
    })
</script>
</html>