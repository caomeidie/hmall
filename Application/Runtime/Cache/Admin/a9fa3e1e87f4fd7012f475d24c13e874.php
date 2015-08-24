<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="<?php echo U('article_class/edit',array('uid'=>$ac_info['ac_id']));?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>分类名称：</dt>
			<dd>
		        <input name="ac_name" type="text" class="required" value="<?php echo ($ac_info['ac_name']); ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>分类代码：</dt>
			<dd>
		        <input name="ac_code" type="text" class="required" value="<?php echo ($ac_info['ac_code']); ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>上级分类：</dt>
			<dd>
			    <select name="ac_parent_id" class="valid">
                <option value="0">请选择...</option>
			    <?php if(is_array($ac_list)): foreach($ac_list as $id=>$val): ?><option value="<?php echo ($id); ?>" <?php if($id == $ac_info['ac_parent_id']): ?>selected<?php endif; ?> >&nbsp;&nbsp;<?php echo ($val['ac_name']); ?></option><?php endforeach; endif; ?>
			    </select>
			</dd>
		</dl>
		<dl>
			<dt>排序：</dt>
			<dd>
		        <input name="ac_sort" type="text" value="255" value="<?php echo ($ac_info['ac_sort']); ?>" />
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