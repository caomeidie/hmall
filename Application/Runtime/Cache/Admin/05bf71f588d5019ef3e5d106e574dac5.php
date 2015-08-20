<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="<?php echo U('member/add');?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>会员名：</dt>
			<dd>
		        <input name="member_name" type="text"  class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>手机号：</dt>
			<dd>
			    <input name="member_mobile" type="text"  class="phone required">
		    </dd>
		</dl>
		<dl>
			<dt>密码：</dt>
			<dd>
			    <input name="member_passwd" id="member_passwd" type="password"  class="required alphanumeric" minlength="6" maxlength="20" />
			</dd>
		</dl>
		<dl>
			<dt>确认密码：</dt>
			<dd>
			    <input name="checkpwd" id="checkpwd" type="password"  class="required" equalto="#member_passwd" />
		    </dd>
		</dl>
		<dl>
			<dt>Email：</dt>
			<dd>
			    <input name="member_email" type="text" class="email">
		    </dd>
		</dl>
		<dl>
			<dt>真实姓名：</dt>
			<dd>
			    <input name="member_truename" type="text">
		    </dd>
		</dl>
		<dl>
			<dt>身份证号：</dt>
			<dd>
			    <input name="member_idcard" type="text">
		    </dd>
		</dl>
		<dl>
			<dt>性别：</dt>
			<dd>
			    <input name="member_sex" type="radio" value=0 checked >保密
			    <input name="member_sex" type="radio" value=1>男
			    <input name="member_sex" type="radio" value=2>女
		    </dd>
		</dl>
		<dl>
			<dt>生日：</dt>
			<dd>
			    <input name="member_birthday" type="text">
		    </dd>
		</dl>
		<dl>
			<dt>是否屏蔽：</dt>
			<dd>
			    <input name="member_state" type="radio" value=1 checked >否
			    <input name="member_state" type="radio" value=0>是
		    </dd>
		</dl>
		<dl>
			<dt>是否VIP：</dt>
			<dd>
			    <input name="member_vip" type="radio" value=0 checked >否
			    <input name="member_vip" type="radio" value=1>是
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