<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" method="post" action="<?php echo U('admin/lists');?>">
	<input type="hidden" name="admin_name" value="${param.admin_name}" />
	<input type="hidden" name="add_time" value="${param.add_time}" />
	<input type="hidden" name="style" value="${param.style}" />
	<input type="hidden" name="pageNum" value="1" />
	<input type="hidden" name="numPerPage" value="<?php echo ($pagination['perpage']); ?>" />
	<input type="hidden" name="orderField" value="${param.orderField}" />
</form>
<div class="pageHeader">
	<form onsubmit="return navTabSearch(this);" action="<?php echo U('admin/lists');?>" method="post">
	<div class="searchBar">
	    <table class="searchContent">
			<tr>
				<td>
					管理员名称：<input type="text" name="admin_name" value="<?php echo ($admin_name); ?>" />
				</td>
				<td>
					<select class="combox" name="style">
						<option value="">所有分类</option>
						<?php if(is_array($style_list)): foreach($style_list as $key=>$style): ?><option value="<?php echo ($style['style_id']); ?>" <?php if($style['style_id'] == $style): ?>selected<?php endif; ?>><?php echo ($style['style_value']); ?></option><?php endforeach; endif; ?>
					</select>
				</td>
				<td>
					添加日期：<input type="text" class="date" name="add_time" readonly="true"  value="<?php echo ($add_time); ?>" />
				</td>
			</tr>
		</table>
		<div class="subBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>
				<li><a class="button" href="demo_page6.html" target="dialog" mask="true" title="查询框"><span>高级检索</span></a></li>
			</ul>
		</div>
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
		    <li><a class="all edit"><span>全选</span></a></li>
			<li><a class="add" href="<?php echo U('admin/add');?>" target="navTab"><span>添加</span></a></li>
			<li><a title="确实要删除这些记录吗?" target="selectedTodo" rel="check" postType="string" href="<?php echo U('admin/del');?>" class="delete"><span>删除</span></a></li>
			<li class="line">line</li>
			<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>
		</ul>
	</div>
	<table class="table" width="100%" layoutH="138">
		<thead>
			<tr>
			    <th width="40"></th>
				<th width="80">id</th>
				<th width="120">用户名</th>
				<th>邮箱</th>
				<th width="100">手机</th>
				<th width="150">添加时间</th>
				<th width="150">最近更新时间</th>
				<th width="80">最近登录IP</th>
				<th width="80">状态</th>
				<th width="80">用户类型</th>
				<th width="80">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($admin_list)): foreach($admin_list as $key=>$value): ?><tr target="sid" rel="<?php echo ($value['admin_id']); ?>">
    		    <td><label><input type="checkbox" name="check" value="<?php echo ($value['admin_id']); ?>" /></label></td>
        		<td><?php echo ($value['admin_id']); ?></td>
                <td><?php echo ($value['admin_name']); ?></td>
                <td><?php echo ($value['email']); ?></td>
                <td><?php echo ($value['phone']); ?></td>
                <td><?php echo (date("Y-m-d H:i:s",$value['addtime'])); ?></td>
                <td><?php echo (date("Y-m-d H:i:s",$value['updatetime'])); ?></td>
                <td><?php echo ($value['lastip']); ?></td>
                <td><?php echo ($value['status']); ?></td>
                <td><?php echo ($value['style_id']); ?></td>
                <td>
                    <a title="删除" target="ajaxTodo" href="<?php echo U('admin/del',array('uid'=>$value['admin_id']));?>" class="btnDel">删除</a>
					<a title="编辑" target="navTab" href="<?php echo U('admin/edit',array('uid'=>$value['admin_id']));?>" class="btnEdit">编辑</a>
                </td>
			</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>显示</span>
			<select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
			    <option value="2" <?php if($pagination['perpage'] <= 2): ?>selected<?php endif; ?>>2</option>
				<option value="20" <?php if($pagination['perpage'] > 2 AND $pagination['perpage'] <= 20): ?>selected<?php endif; ?>>20</option>
				<option value="50" <?php if($pagination['perpage'] > 20 AND $pagination['perpage'] <= 50): ?>selected<?php endif; ?>>50</option>
				<option value="100" <?php if($pagination['perpage'] > 50 AND $pagination['perpage'] <= 100): ?>selected<?php endif; ?>>100</option>
				<option value="200" <?php if($pagination['perpage'] > 100 AND $pagination['perpage'] <= 200): ?>selected<?php endif; ?>>200</option>
			</select>
			<span>条，共<?php echo ($pagination['count']); ?>条</span>
		</div>
		
		<div class="pagination" targetType="navTab" totalCount="<?php echo ($pagination['count']); ?>" numPerPage="<?php echo ($pagination['perpage']); ?>" pageNumShown="<?php echo ($pagination['pagenum']); ?>" currentPage="<?php echo ($pagination['page']+1); ?>"></div>
	</div>
</div>
<script>
    var href = $("#delete").attr('href');
</script>