@extends("admin.layout.main")
    @section('title', '用户管理')
@section("content")
   <div class="ibox-title">
        <blockquote class="layui-elem-quote">
            <a href="{{url('/admin/user')}}"><i class="fa fa-step-backward "></i></a>
            <b>编辑管理员</b>
        </blockquote>
    </div>
    <div class="ibox float-e-margins">
        <div class="ibox-content ">
            <div class="layui-row">
                <form class="layui-form layui-form-pane layui-col-md6 layui-col-md-offset1">
                    <div class="layui-form-item">
                            <input type="hidden" name="au_id" id="au_id"  class="layui-input" value="{{$adminUser->au_id}}">
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属用户组</label>
                        <div class="layui-input-block">
                            <select name="ar_id" id="ar_id" lay-verify="group">
                                <option value="" selected="">请选择角色</option>
                                @foreach ($roles as $role)
                                    <option value="{{$role['ar_id']}}" @if ($role['ar_id'] == $myRole[0])
                                    selected @endif>{{$role['ar_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">登录账户</label>
                        <div class="layui-input-block">
                            <input type="text" name="au_name" id="au_name" lay-verify="username" class="layui-input" value="{{$adminUser->au_name}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">用户姓名</label>
                        <div class="layui-input-block">
                            <input type="text" name="au_realname" id="au_realname" lay-verify="realName" class="layui-input" value="{{$adminUser->au_realname}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">手机号码</label>
                        <div class="layui-input-block">
                            <input type="text" name="au_mobile" id="au_mobile" lay-verify="phone"  class="layui-input" value="{{$adminUser->au_mobile}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">用户邮箱</label>
                        <div class="layui-input-block">
                            <input type="text" name="au_email" id="au_email" lay-verify="email" class="layui-input" value="{{$adminUser->au_email}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">用户密码</label>
                        <div class="layui-input-block">
                            <input type="password" name="password" id="password" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">确认密码</label>
                        <div class="layui-input-block">
                            <input type="password" name="password_c" id="password_c" lay-verify="repass" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item" pane="">
                        <label class="layui-form-label">是否禁用</label>
                        <div class="layui-input-block">
                            <input type="checkbox"  name="au_status" lay-skin="switch" lay-filter="switchTest" lay-text="启用|禁用" @if(!$adminUser->au_status) checked="" @endif>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="edit">保存</button>
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



