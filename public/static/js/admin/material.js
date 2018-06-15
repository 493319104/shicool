$.material = {
    categoryAdd:function()
    {
        var categoryName = $("input[name='categoryName']").val();
        if (categoryName == '') {
            alert("素材分类名称不能为空");
            return false;
        }
        var pid = $("select[name='pid'] option:selected").val();
        var status = $("select[name='status'] option:selected").val();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '/admin/material/categoryAdd',
            data: {
                'categoryName': categoryName,
                'status': status,
                'pid': pid,
                'id': $("input[name='id']").val()
            },
            success:function(msgs)
            {
                if (msgs.code == '-1') {
                    alert("提交失败");
                    return false;
                } else {
                    alert('提交成功');
                }
                location.href = '/admin/material/category';
            },
            error:function(){}
        });
    },
};