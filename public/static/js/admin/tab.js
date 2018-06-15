layui.use('element', function(){
    var $ = layui.jquery
        ,element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块

    //触发事件
    var active = {
        tabAdd: function (url, id, title) {
            //新增一个Tab项
            element.tabAdd('layout-tab', {
                title: title //用于演示
                , content: '<iframe data-frameid="'+id+'" frameborder="0" name="content" scrolling="no" width="100%" src="' + url + '"></iframe>'
                , id: id //实际使用一般是规定好的id，这里以时间戳模拟下
            })
            FrameWH();
        }
        , tabChange: function (id) {
            //切换到指定Tab项
            element.tabChange('layout-tab', id); //切换到：用户管理
            $("iframe[data-frameid='"+id+"']").attr("src",$("iframe[data-frameid='"+id+"']").attr("src"))//切换后刷新框架
        }
        , tabDelete: function (id) {
            element.tabDelete("layout-tab", id);//删除
        }
    };

    $('.site-active').on('click', function(){
        var dataid = $(this);
        if ($(".layui-tab-title li[lay-id]").length <= 0) {
            active.tabAdd(dataid.attr("data-url"), dataid.attr("data-id"), dataid.html());
        } else {
            var isData = false;
            $.each($(".layui-tab-title li[lay-id]"), function () {
                if ($(this).attr("lay-id") == dataid.attr("data-id")) {
                    isData = true;
                }
            })
            if (isData == false) {
                active.tabAdd(dataid.attr("data-url"), dataid.attr("data-id"), dataid.html());
            }
        }
        active.tabChange(dataid.attr("data-id"));
    });
    function FrameWH() {
        var h = $(window).height() -41- 10 - 60 -10-44 -10;
        $("iframe").css("min-height",h+"px");
    }

    $(window).resize(function () {
        FrameWH();
    })
});