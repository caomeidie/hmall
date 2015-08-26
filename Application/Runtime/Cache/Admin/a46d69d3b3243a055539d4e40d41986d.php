<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="<?php echo U('goods_class/add');?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>分类名称：</dt>
			<dd>
		        <input name="name" type="text"  class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>上级分类：</dt>
			<dd>
		        <select name="gc">
			    <option value="0">请选择...</option>
			    <?php if($list_tree): if(is_array($list_tree)): foreach($list_tree as $key=>$gc): ?><option value="<?php echo ($gc['val']['gc_id']); ?>"><?php echo ($gc['html']); echo ($gc['val']['gc_name']); ?></option><?php endforeach; endif; endif; ?>
		        </select>
		    </dd>
		</dl>
		<dl>
			<dt>关联类型：</dt>
			<dd>
			    <select name="type">
			    <option value="0">请选择...</option>
			    <?php if($type_list): if(is_array($type_list)): foreach($type_list as $key=>$type): ?><option value="<?php echo ($type['type_id']); ?>"><?php echo ($type['type_name']); ?></option><?php endforeach; endif; endif; ?>
		        </select>
		    </dd>
		</dl>
		<dl>
			<dt>显示：</dt>
			<dd>
			    <input type="radio" name="show" value="1" checked >是
			    <input type="radio" name="show" value="0" >否
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