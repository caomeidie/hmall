<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="<?php echo U('article/edit',array('uid'=>$article_info['article_id']));?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>标题：</dt>
			<dd>
		        <input name="title" type="text" class="required" value="<?php echo ($article_info['article_title']); ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>所属分类：</dt>
			<dd>
			    <select name="ac_id" class="valid">
                <option value="0">请选择...</option>
			    <?php if(is_array($ac_list)): foreach($ac_list as $id=>$val): ?><option value="<?php echo ($id); ?>" <?php if($id == $article_info['ac_id']): ?>selected<?php endif; ?>>&nbsp;&nbsp;<?php echo ($val['ac_name']); ?></option><?php endforeach; endif; ?>
			    </select>
			</dd>
		</dl>
		<dl>
			<dt>链接：</dt>
			<dd>
		        <input name="url" type="text" value="<?php echo ($article_info['article_url']); ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>是否显示：</dt>
			<dd>
			    <input type="radio" name="isshow" value="1" <?php if($article_info['article_show'] == 1): ?>checked<?php endif; ?> >显示
			    <input type="radio" name="isshow" value="0" <?php if($article_info['article_show'] == 0): ?>checked<?php endif; ?> >隐藏
		    </dd>
		</dl>
		<dl>
			<dt>排序：</dt>
			<dd>
		        <input name="sort" type="text" value="<?php echo ($article_info['article_sort']); ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>文章内容：</dt>
			<dd>
		        <textarea class="editor" name="content" rows="20" cols="100" upLinkUrl="/hmall/Public/static/upload.php" upLinkExt="zip,rar,txt" upImgUrl="/hmall/Public/static/upload.php" upImgExt="jpg,jpeg,gif,png" upFlashUrl="/hmall/Public/static/upload.php" upFlashExt="swf" upMediaUrl="/hmall/Public/static/upload.php" upMediaExt:"avi"><?php echo ($article_info['article_content']); ?></textarea>
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