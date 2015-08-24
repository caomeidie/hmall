<?php if (!defined('THINK_PATH')) exit();?><script src="/hmall/Public/Admin/js/hmall.style.js" type="text/javascript"></script>
<div class="pageContent">
	<form method="post" action="<?php echo U('admin_style/edit',array('uid'=>$style_info['style_id']));?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>类型名：</dt>
			<dd>
		        <input name="style_name" type="text" value="<?php echo ($style_info['style_value']); ?>" class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>角色权限：</dt>
			<dd>
			    <div>
			    	<?php $style_info['roles'] = unserialize($style_info['roles']) ?>
			    	<?php if(is_array($roles_list)): foreach($roles_list as $id=>$role): if(($role['parent_role_id'] != 0 AND $roles_list[$role['parent_role_id']]['parent_role_id'] == 0) OR $role['parent_role_id'] == 0): ?><div class="role_list"><?php echo ($role['role_desc']); ?><br><?php endif; ?>
	    			    <input name="roles[]" type="checkbox" <?php if(in_array($role['role_id'], $style_info['roles'])): ?>checked="checked"<?php endif; ?> value="<?php echo ($role['role_id']); ?>" <?php if($role['related_role_id']): ?>related="<?php echo ($role['related_role_id']); ?>"<?php endif; ?> /><?php echo ($role['role_desc']); endforeach; endif; ?>
			    </div>
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