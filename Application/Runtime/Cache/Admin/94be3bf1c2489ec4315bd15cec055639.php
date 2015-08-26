<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="<?php echo U('goods_type/add');?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>类型名称：</dt>
			<dd>
		        <input name="name" type="text"  class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>关联规格：</dt>
			<dd>
			    <?php if($spec_list): if(is_array($spec_list)): foreach($spec_list as $key=>$spec): ?><input name="spec[]" type="checkbox" value="<?php echo ($spec['spec_id']); ?>" /><span style="font-weight: bold;"><?php echo ($spec['spec_name']); ?>：</span><?php echo implode('，', unserialize($spec['spec_value']));?></br><?php endforeach; endif; endif; ?>
		    </dd>
		</dl>
		<dl>
			<dt>关联属性：</dt>
			<dd>
			    <?php if($attr_list): if(is_array($attr_list)): foreach($attr_list as $key=>$attr): ?><input name="attr[]" type="checkbox" value="<?php echo ($attr['attr_id']); ?>" /><span style="font-weight: bold;"><?php echo ($attr['attr_name']); ?>：</span><?php echo implode('，', unserialize($attr['attr_value']));?></br><?php endforeach; endif; endif; ?>
		    </dd>
		</dl>
		<dl>
			<dt>关联品牌：</dt>
			<dd>
			    <?php if($brand_list): if(is_array($brand_list)): foreach($brand_list as $key=>$brand): ?><input name="brand[]" type="checkbox" value="<?php echo ($brand['brand_id']); ?>" /><?php echo ($brand['brand_name']); endforeach; endif; endif; ?>
		    </dd>
		</dl>
		<dl>
			<dt>索引：</dt>
			<dd>
			    <input name="sort" type="text" >
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