<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="<?php echo U('setting/saveEmail');?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>邮件功能开启:</dt>
			<dd>
		        <input name="open" type="radio" value=1 <?php if($setting_list['email_enable']['setting_val'] == 1): ?>checked<?php endif; ?> />开启
		        <input name="open" type="radio" value=0 <?php if($setting_list['email_enable']['setting_val'] == 0): ?>checked<?php endif; ?> />关闭
		    </dd>
		</dl>
		<dl>
			<dt>SMTP 服务器:</dt>
			<dd>
			    <input name="host" id="email_host" type="text" value="<?php echo ($setting_list['email_host']['setting_val']); ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>SMTP 端口:</dt>
			<dd>
			    <input name="port" id="email_port" type="text" value="<?php echo ($setting_list['email_port']['setting_val']); ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>发信人邮件地址:</dt>
			<dd>
		        <input name="addr" id="email_addr" type="text" value="<?php echo ($setting_list['email_addr']['setting_val']); ?>"  />
		    </dd>
		</dl>
		<dl>
			<dt>SMTP 身份验证用户名:</dt>
			<dd>
		        <input name="user" id="email_user" type="text" value="<?php echo ($setting_list['email_user']['setting_val']); ?>"  />
		    </dd>
		</dl>
		<dl>
			<dt>SMTP 身份验证密码:</dt>
			<dd>
		        <input name="pass" id="email_pass" type="password" value="<?php echo ($setting_list['email_pass']['setting_val']); ?>"  />
		    </dd>
		</dl>
		<dl>
			<dt>测试接收的邮件地址:</dt>
			<dd>
		        <input name="addr_test" id="addr_test" type="text" />
		        <input type="button" value="测试" name="send_test_email" class="btn" id="send_test_email">
		    </dd>
		</dl>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>

<script>
$(document).ready(function(){
	$('#send_test_email').click(function(){
		$.ajax({
			type:'POST',
			url:'index.php',
			data:'r=message/testEmail&email_host='+$('#email_host').val()+'&email_port='+$('#email_port').val()+'&email_addr='+$('#email_addr').val()+'&email_user='+$('#email_user').val()+'&email_pass='+$('#email_pass').val()+'&addr_test='+$('#addr_test').val(),
			error:function(){
					alert('测试邮件发送失败，请重新配置邮件服务器');
				},
			success:function(html){
				if(html.status == 1){
				    alert('测试邮件发送成功，请查收！');
				}else{
					alert('测试邮件发送失败，请重新配置邮件服务器！');
				}
			},
			dataType:'json'
		});
	});
});
</script>