<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="<?php echo U('goods_spec/add');?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>规格名称：</dt>
			<dd>
		        <input name="name" id="SpecForm_name" type="text"  class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>规格值：</dt>
			<dd>
		        <input name="value" id="SpecForm_value" type="text"  class="required" /><span>多值用英文（,）分割，不要添加空格</span>
		    </dd>
		</dl>
		<dl>
			<dt>索引：</dt>
			<dd>
			    <input name="sort" id="SpecForm_sort" type="text" >
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