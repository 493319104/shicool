$.user = {
    categoryAdd:function()
    {
        var categoryName = $("input[name='categoryName']").val();
        if (categoryName == '') {
            alert("会员分类名称不能为空");
            return false;
        }
        var type = $("select[name='type'] option:selected").val();
        var status = $("select[name='status'] option:selected").val();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '/admin/user/categoryAdd',
            data: {
                'categoryName': categoryName,
                'status': status,
                'type': type,
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
                location.href = '/admin/user/category';
            },
            error:function(){}
        });
    },
    userAdd:function()
    {
        var userName = $("input[name='userName']").val();
        if (userName == '') {
            alert("手机号码不能为空");
            return false;
        }
        var password = $("input[name='password']").val();
        var nickname = $("input[name='nickname']").val();
        var email = $("input[name='email']").val();
        var sex = $("select[name='sex'] option:selected").val();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '/admin/user/userAdd',
            data: {
                'userName': userName,
                'password': password,
                'nickname': nickname,
                'email': email,
                'sex': sex,
            },
            success:function(msgs)
            {
                if (msgs.code == '0') {
                    alert(msgs.codeinfo);
                    return false;
                } else {
                    alert('提交成功');
                }
                location.href = '/admin/user/userlist';
            },
            error:function(){}
        });
    },
};