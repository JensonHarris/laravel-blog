<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BJSON博客后台</title>
	<meta name="keywords" content="LarryCMS后台登录界面" />
	<meta name="description" content="LarryCMS Version:1.09" />
	<meta name="Author" content="larry" />
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="Shortcut Icon" href="/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="/admin/plugins/layui/css/layui.css" media="all">
	<link rel="stylesheet" type="text/css" href="/admin/css/login.css" media="all">
</head>
<body>
<form class="form-horizontal layui-form layui-form-pane">
	{{ csrf_field() }}
	<div class="larry-canvas" id="canvas"></div>
	<div class="layui-layout layui-layout-login">
		<h1>
			<strong>BJSON博客系统后台</strong>
			<em>Jenson Harris</em>
		</h1>
		<div class="layui-user-icon larry-login">
			<input type="text" placeholder="账号" lay-verify="username" class="login_txtbx" id="username" name="au_name" />
		</div>
		<div class="layui-pwd-icon larry-login">
			<input type="password" placeholder="密码" lay-verify="pass" class="login_txtbx" id="password" name="password" />
		</div>
		<div class="layui-val-icon larry-login">
			<div class="layui-code-box">
				<input type="text" placeholder="验证码" maxlength="5" lay-verify="code" class="login_txtbx" id="code" name="code" >
				<img src="{{captcha_src()}}" alt="" class="verifyImg" id="verifyImg" onclick="this.src='{{captcha_src()}}'+Math.random()">
			</div>
		</div>
		<div class="layui-submit larry-login">
			<input type="button" value="立即登陆" class="submit_btn" lay-submit lay-filter="*"/>
		</div>
		<div class="layui-login-text">
			<p>© 2018-2019 BJSON 版权所有</p>
			<p>粤ICP备18048113 <a href="" title="">bjson.cn</a></p>
		</div>
	</div>
</form>
<script type="text/javascript" src="/admin/plugins/layui/layui.js"></script>
<script type="text/javascript" src="/admin/js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="/admin/js/jparticle.jquery.js"></script>
<script type="text/javascript" src="/admin/js/login.js"></script>
</body>
</html>
