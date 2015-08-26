<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="<?php echo U('goods_brand/add');?>" class="pageForm required-validate" onsubmit="return iframeCallback(this, navTabAjaxDone);" enctype="multipart/form-data">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>品牌名称：</dt>
			<dd>
		        <input name="name" type="text" class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>品牌Logo：</dt>
			<dd>
			<input type="file" name="attach" id="attach" />
		    </dd>
		</dl>
		<dl>
			<dt>品牌类型：</dt>
			<dd>
			<input type="radio" name="type" value="1" checked />图片
			<input type="radio" name="type" value="0" />文字
		    </dd>
		</dl>
		<dl>
			<dt>品牌索引：</dt>
			<dd>
		        <input name="sort" type="text" />
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