layui.use(['form'], function(){
    var form = layui.form

    layui.config({
        base: '/admin/plugins/layui_ext/dtree/' //配置 layui 第三方扩展组件存放的基础目录
    }).extend({
        dtree: 'dtree' //定义该组件模块名
    }).use(['element', 'layer', 'dtree'], function() {
        var layer = layui.layer,
            dtree = layui.dtree,
            $ = layui.$;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var DemoTree = dtree.render({
            elem: "#menubarTree2",
            url: "/admin/role/create",
            // data: data,
            checkbar: true,
            initLevel: 1,
            menubar: true,
            dataStyle:"layuiStyle",
            response:{
                code: 200,
                treeId: 'ap_id',
                parentId: "ap_pid",
                title:'ap_name',
                rootName: 'data'
            },
            menubarTips: {
                toolbar: ["moveDown", "moveUp"],
                group: []
            },
            defaultRequest:{
                nodeId: "ap_id",		//节点ID
                parentId: "ap_pid",	//父节点ID
                context: "ap_name",	//节点内容
            },
            toolbar: true,
            toolbarScroll: "#toolbarDiv",
            toolbarShow: [], // 工具栏自带的按钮制空
            dot: false
        });

        //监听提交
        form.on('submit(add)', function(data){
            if (data.field.ar_status=='on'){
                data.field.ar_status = 0;
            }else{
                data.field.ar_status = 1;
            }
            data.field.permissions = dtree.getCheckbarNodesParam("menubarTree2");

            console.log(data.field);
            $.ajax({
                type: "POST",
                url: '/admin/role',
                dataType: "json",
                data: data.field,
                error: function(msg) {
                    if (msg.status == 422) {
                        var json=JSON.parse(msg.responseText);
                        json = json.errors;
                        for ( var item in json) {
                            for ( var i = 0; i < json[item].length; i++) {
                                layer.msg(json[item][i], {icon: 5});
                                return ; //遇到验证错误，就退出
                            }
                        }
                    } else {
                        layer.msg('服务器连接失败', {icon: 5});
                        return ;
                    }
                },
                success: function(res) {
                    if (res.status) {
                        layer.msg(res.message, {
                            icon: 1,//提示的样式
                            time: 2000, //2秒关闭
                            end:function(){
                                window.location.href="/admin/role";
                            }
                        });
                    } else {
                        layer.msg(res.message, {icon: 5});
                    }
                }
            });
            return false; //阻
        });
    });
});





