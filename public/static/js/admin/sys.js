$.sys = {
    permissionAdd:function()
    {
        var permissionName = $("input[name='permissionName']").val();
        if (permissionName == '') {
            alert("权限名不能为空");
            return false;
        }
        var controller = $("input[name='controller']").val();
        var action = $("input[name='action']").val();
        var pid = $("select[name='pid'] option:selected").val();
        var type = $("select[name='type'] option:selected").val();
        var status = $("select[name='status'] option:selected").val();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '/admin/sys/permissionAdd',
            data: {
                'permissionName': permissionName,
                'controller': controller,
                'action': action,
                'status': status,
                'pid': pid,
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
                location.href = '/admin/sys/permissionList';
            },
            error:function(){}
        });
    },
    addManager:function()
    {
        var username = $("input[name='username']").val();
        var password = $("input[name='password']").val();
        var group = $("select[name='group'] option:selected").val();
        var status = $("select[name='status'] option:selected").val();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '/admin/sys/addManager',
            data: {
                'username': username,
                'password': password,
                'group': group,
                'status': status,
            },
            success:function(msgs)
            {
                if (msgs.code == 1) {
                    alert('添加成功');
                    location.href = '/admin/sys/manager';
                } else if (msgs.code == -1) {
                    alert('添加失败');
                } else {
                    alert(msgs.codeinfo);
                }
            },
            error:function(){}
        });
    },
    permissionGroupAdd:function()
    {
        var permissionGroupName = $("input[name='permissionGroupName']").val();
        var status = $("select[name='status'] option:selected").val();
        var permissionArray = new Array();
        $("input[name='permission']").each(function(){
            if ($(this).is(":checked")) {
                permissionArray.push($(this).val());
            }
        });
        if (permissionGroupName == '') {
            alert('权限组名称不能为空');
            return false;
        }
        if (permissionArray.length <= 0) {
            alert('请选择权限');
            return false;
        }
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '/admin/sys/permissionGroupAdd',
            data: {
                'permissionGroupName': permissionGroupName,
                'status': status,
                'permissionArray': permissionArray,
                'id': $("input[name='id']").val(),
            },
            success:function(msgs)
            {
                if (msgs.code == 1) {
                    alert('添加成功');
                    location.href = '/admin/sys/permissionGroup';
                } else if (msgs.code == -1) {
                    alert('添加失败');
                }
            },
            error:function(){}
        });
    },
};