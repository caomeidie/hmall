<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="<?php echo U('member/edit',array('uid'=>$member_info['member_id']));?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>会员名：</dt>
			<dd>
		        <input name="member_name" type="text" value="<?php echo ($member_info['member_name']); ?>" class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>手机号：</dt>
			<dd>
			    <input name="member_mobile" type="text" value="<?php echo ($member_info['member_mobile']); ?>" class="phone required">
		    </dd>
		</dl>
		<dl>
			<dt>Email：</dt>
			<dd>
			    <input name="member_email" type="text" class="email" value="<?php echo ($member_info['member_email']); ?>">
		    </dd>
		</dl>
		<dl>
			<dt>真实姓名：</dt>
			<dd>
			    <input name="member_truename" type="text" value="<?php echo ($member_info['member_truename']); ?>">
		    </dd>
		</dl>
		<dl>
			<dt>身份证号：</dt>
			<dd>
			    <input name="member_idcard" type="text" value="<?php echo ($member_info['member_idcard']); ?>">
		    </dd>
		</dl>
		<dl>
			<dt>性别：</dt>
			<dd>
			    <input name="member_sex" type="radio" value=0 <?php if($member_info['member_sex'] == 0): ?>checked<?php endif; ?> >保密
			    <input name="member_sex" type="radio" value=1 <?php if($member_info['member_sex'] == 1): ?>checked<?php endif; ?> >男
			    <input name="member_sex" type="radio" value=2 <?php if($member_info['member_sex'] == 2): ?>checked<?php endif; ?> >女
		    </dd>
		</dl>
		<dl>
			<dt>生日：</dt>
			<dd>
			    <input name="member_birthday" type="text" value="<?php echo ($member_info['member_birthday']); ?>">
		    </dd>
		</dl>
		<dl>
			<dt>是否屏蔽：</dt>
			<dd>
			    <input name="member_state" type="radio" value=1 <?php if($member_info['member_state'] == 1): ?>checked<?php endif; ?> >否
			    <input name="member_state" type="radio" value=0 <?php if($member_info['member_state'] == 0): ?>checked<?php endif; ?> >是
		    </dd>
		</dl>
		<dl>
			<dt>是否VIP：</dt>
			<dd>
			    <input name="member_vip" type="radio" value=0 <?php if($member_info['member_vip'] == 0): ?>checked<?php endif; ?> >否
			    <input name="member_vip" type="radio" value=1 <?php if($member_info['member_vip'] == 1): ?>checked<?php endif; ?> >是
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