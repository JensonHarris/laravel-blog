@extends("admin.layout.main")
    @section('title', '用户管理')
@section("content")
   <div class="ibox-title">
        <blockquote class="layui-elem-quote">
            <a href="{{url('/admin/user')}}"><i class="fa fa-step-backward "></i></a>
            <b>添加管理员</b>
        </blockquote>
    </div>
    <div class="ibox float-e-margins">
        <div class="ibox-content ">
            <div class="layui-row">
                <form class="layui-form layui-form-pane layui-col-md6 layui-col-md-offset1">
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属角色</label>
                        <div class="layui-input-block">
                            <select name="ar_id" id="ar_id" lay-verify="group">
                                <option value="" selected="">请选择角色</option>
                                   @foreach ($roles as $role)
                                <option value="{{$role['ar_id']}}">{{$role['ar_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">登录账户</label>
                        <div class="layui-input-block">
                            <input type="text" name="au_name" id="au_name" lay-verify="username" placeholder="请输入用户登录账号" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">用户姓名</label>
                        <div class="layui-input-block">
                            <input type="text" name="au_realname" id="au_realname" lay-verify="realName" placeholder="请输入用户姓名" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">手机号码</label>
                        <div class="layui-input-block">
                            <input type="text" name="au_mobile" id="au_mobile" lay-verify="phone" placeholder="请输入用户手机号码" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">用户邮箱</label>
                        <div class="layui-input-block">
                            <input type="text" name="au_email" id="au_email" lay-verify="email" placeholder="请输入用户邮箱" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">用户密码</label>
                        <div class="layui-input-block">
                            <input type="password" name="password" id="password" lay-verify="pass" placeholder="请输入用户密码"  class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">确认密码</label>
                        <div class="layui-input-block">
                            <input type="password" name="password_c" id="password_c" lay-verify="repass" placeholder="请输入密码"  class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item" pane="">
                        <label class="layui-form-label">是否禁用</label>
                        <div class="layui-input-block">
                            <input type="checkbox" checked="" name="au_status" lay-skin="switch" lay-filter="switchTest" lay-text="启用|禁用">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="add">保存</button>
                            <button type="reset" class="layui-btn layui-btn-primary" lay-submit lay-filter="">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript" src="/admin/js/user.js"></script>
@endsection



