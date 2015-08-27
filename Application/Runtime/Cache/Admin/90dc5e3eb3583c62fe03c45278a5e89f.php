<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	选择商品分类：
	<form method="post" action="<?php echo U('goods/add', array('step'=>'two'));?>" class="pageForm required-validate" onsubmit="return navTabSearch(this);">
		<div class="pageFormContent nowrap" layoutH="97">
		    <select name="goodsclass">
		    <?php if($list_tree): if(is_array($list_tree)): foreach($list_tree as $key=>$gc): ?><option value="<?php echo ($gc['val']['gc_id']); ?>"><?php echo ($gc['html']); echo ($gc['val']['gc_name']); ?></option><?php endforeach; endif; endif; ?>
	        </select>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">下一步</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>