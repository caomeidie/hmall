<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="<?php echo U('goods_spec/edit',array('uid'=>$spec_info['spec_id']));?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>规格名称：</dt>
			<dd>
		        <input name="name" type="text" value="<?php echo ($spec_info['spec_name']); ?>" class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>规格值：</dt>
			<dd>
		        <input name="value" type="text" value="<?php echo implode(',', unserialize($spec_info['spec_value']));?>" class="required" /><span>多值用英文（,）分割，不要添加空格</span>
		    </dd>
		</dl>
		<dl>
			<dt>索引：</dt>
			<dd>
			    <input name="sort" type="text" value="<?php echo ($spec_info['spec_sort']); ?>" />
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