<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" name="StoreForm" action="<?php echo U('store/edit',array('uid'=>$store_info['store_id']));?>" class="pageForm required-validate" onsubmit="return iframeCallback(this, navTabAjaxDone);" enctype="multipart/form-data">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>店铺名称：</dt>
			<dd>
		        <input name="name" type="text" value="<?php echo ($store_info['store_name']); ?>" class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>店铺Logo：</dt>
			<dd>
			<input type="file" name="attach" id="attach" />
			<img src="/hmall/Public/upload/store/<?php echo ($store_info['store_logo']); ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>店铺等级：</dt>
			<dd>
			    <select name="storegrade" class="valid">
                <option value="0">请选择...</option>
			    <?php if(is_array($sg_list)): foreach($sg_list as $key=>$val): ?><option value="<?php echo ($val['sg_id']); ?>" <?php if($val['sg_id'] == $store_info['grade_id']): ?>selected<?php endif; ?>>&nbsp;&nbsp;<?php echo ($val['sg_name']); ?></option><?php endforeach; endif; ?>
			    </select>
		    </dd>
		</dl>
		<dl>
			<dt>店主姓名：</dt>
			<dd>
		        <input name="name_auth" type="text" value="<?php echo ($store_info['store_owner_name']); ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>身份证号：</dt>
			<dd>
		        <input name="idcard" type="text" value="<?php echo ($store_info['store_owner_card']); ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>店铺地址：</dt>
			<dd>
		        <input name="store_address" type="text" value="<?php echo ($store_info['store_address']); ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>邮政编码：</dt>
			<dd>
		        <input name="store_zip" type="text" value="<?php echo ($store_info['store_zip']); ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>手机号：</dt>
			<dd>
		        <input name="store_mobile" type="text" value="<?php echo ($store_info['store_mobile']); ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>店铺状态：</dt>
			<dd>
		        <input name="store_state" value="1" type="radio" <?php if($store_info['store_state'] == 1): ?>checked<?php endif; ?> />开启
		        <input name="store_state" value="0" type="radio" <?php if($store_info['store_state'] == 0): ?>checked<?php endif; ?>/>关闭
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