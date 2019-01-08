@extends("admin.layout.main")
    @section('title', '权限管理')
@section("content")
  <div class="ibox-title">
        <blockquote class="layui-elem-quote">
            <a href="{{url('/admin/auth')}}"><i class="fa fa-step-backward "></i></a>
            <b>添加权限</b>
        </blockquote>
    </div>
    <div class="ibox float-e-margins">
        <div class="ibox-content ">
            <div class="layui-row">
            <form class="layui-form layui-form-pane layui-col-md7 layui-col-md-offset1" action="">
                <div class="layui-form-item">
                    <label class="layui-form-label">父级权限</label>
                    <div class="layui-input-block">
                        <select name="interest" lay-filter="aihao">
                            <option value="">请选择权限</option>
                            <option value="0" selected="">顶级权限</option>
                            <option value="1">用户管理</option>
                            <option value="2">用户列表</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">权限名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" autocomplete="off" placeholder="请输入权限名称..." class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">控制器名</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" autocomplete="off" placeholder="请输入控制器名..." class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">方法名</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" autocomplete="off" placeholder="请输入方法名..." class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">URL</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" autocomplete="off" placeholder="请输入URL..." class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit="" lay-filter="InputContent">保存</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

<script>
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,laydate = layui.laydate;

        //日期
        laydate.render({
            elem: '#date'
        });
        laydate.render({
            elem: '#date1'
        });

        //创建一个编辑器
        var editIndex = layedit.build('LAY_demo_editor');

        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 5){
                    return '标题至少得5个字符啊';
                }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            ,content: function(value){
                layedit.sync(editIndex);
            }
        });

        //监听指定开关
        form.on('switch(switchTest)', function(data){
            layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                offset: '6px'
            });
            layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
        });

        //监听提交
        form.on('submit(InputContent)', function(data){
            layer.alert(JSON.stringify(data.field), {
                title: '最终的提交信息'
            })
            return false;
        });
    });
</script>
@endsection

