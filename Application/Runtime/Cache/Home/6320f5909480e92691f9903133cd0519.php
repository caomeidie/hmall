<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hongweb system</title>
<script src="/hmall/Public/Home/js/jquery.js" type="text/javascript"></script>
<script src="/hmall/Public/Home/js/jquery.validation.min.js" type="text/javascript"></script>
<style>
	#registform label.error {
		margin-left: 10px;
		width: auto;
		display: inline;
	}
</style>
</head>
<h1>注册</h1>

<div class="form">
	<form method="post" name="registform" id="registform" action="<?php echo U('login/regist');?>">
		<dl>
			<dt>用户名：</dt>
			<dd>
		        <input name="name" id="name" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>手机号：</dt>
			<dd>
			    <input name="mobile" id="mobile" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>Email：</dt>
			<dd>
			    <input name="email" id="email" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>密码：</dt>
			<dd>
		        <input name="password" id="password" type="password" />
		    </dd>
		</dl>
		<dl>
			<dt>确认密码：</dt>
			<dd>
		        <input name="confirmpwd" id="confirmpwd" type="password" />
		    </dd>
		</dl>
		<dl>
			<dt>验证码：</dt>
			<dd>
			    <input name="code" type="text" id="code" />
			</dd>
			<dd><img height="40px" class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('login/verify');?>"></dd>
		</dl>
		<dl>
			<dt></dt>
			<dd>
			    <input type="submit" value="注册" />
			</dd>
		</dl>
	</form>
</div>
<script type="text/javascript">
$(function(){
	//刷新验证码
	var verifyimg = $(".verifyimg").attr("src");
    $(".reloadverify").click(function(){
        if( verifyimg.indexOf('?')>0){
            $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
        }else{
            $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
        }
    });
})
</script>
<script>
	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});

	$(function(){
		jQuery.validator.addMethod("mobile", function(value, element) {
			return this.optional(element) || value.match(/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
		});
		// validate signup form on keyup and submit
		$("#registform").validate({
			rules: {
				name: {
					required: true,
					minlength: 2
				},
				mobile: {
					required: true,
					mobile: true
				},
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 6
				},
				confirmpwd: {
					required: true,
					minlength: 6,
					equalTo: "#password"
				},
				code: {
					required: true,
					minlength: 4
				}
			},
			messages: {
				name: {
					required: "请输入用户名",
					minlength: "用户名不能少于两个字符"
				},
				mobile: {
					required: "请输入手机号码",
					mobile: "手机号码格式有误"
				},
				email: {
					required: "请输入邮箱",
					email: "邮箱格式有误"
				},
				password: {
					required: "请输入密码",
					minlength: "密码不能少于6位"
				},
				confirmpwd: {
					required: "请输入确认密码",
					minlength: "确认密码不能少于6位",
					equalTo: "确认密码有误"
				},
				code: {
					required: "请输入验证码",
					minlength: "确认密码不能少于4位"
				}
			}
		});
	});
</script>
</html>