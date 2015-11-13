<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>皇家马球俱乐部</title>
<meta name="keywords" content="皇家马球俱乐部">
<meta name="description" content="皇家马球俱乐部">
<style type="text/css">
body {
_behavior: url(_CSS__/csshover.htc);
}
</style>
<link rel="shortcut icon" href="http://192.168.0.110/b2b2c/favicon.ico">
<link href="/hmall/Public/Home/css/base.css" rel="stylesheet" type="text/css">
<link href="/hmall/Public/Home/css/home_header.css" rel="stylesheet" type="text/css">
<link href="/hmall/Public/Home/css/home_login.css" rel="stylesheet" type="text/css">
<link href="/hmall/Public/Home/css/font/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!--[if IE 7]>
  <link rel="stylesheet" href="/hmall/Public/Home/css/font/font-awesome/css/font-awesome-ie7.min.css">
<![endif]-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="/hmall/Public/Home/js/html5shiv.js"></script>
      <script src="/hmall/Public/Home/js/respond.min.js"></script>
<![endif]-->
<!--[if IE 6]>
<script src="/hmall/Public/Home/js/IE6_PNG.js"></script>
<script>
DD_belatedPNG.fix('.pngFix');
</script>
<script>
// <![CDATA[
if((window.navigator.appName.toUpperCase().indexOf("MICROSOFT")>=0)&&(document.execCommand))
try{
document.execCommand("BackgroundImageCache", false, true);
   }
catch(e){}
// ]]>
</script>
<![endif]-->
<script>
var COOKIE_PRE = '40D3_';var _CHARSET = 'utf-8';var SITEURL = 'http://192.168.0.110/b2b2c/shop';var SHOP_SITE_URL = 'http://192.168.0.110/b2b2c/shop';var RESOURCE_SITE_URL = 'http://192.168.0.110/b2b2c/data/resource';var RESOURCE_SITE_URL = 'http://192.168.0.110/b2b2c/data/resource';var SHOP_TEMPLATES_URL = 'http://192.168.0.110/b2b2c/shop/templates/default';
</script>
<script src="/hmall/Public/Home/js/jquery.js" charset="utf-8"></script>
<script src="/hmall/Public/Home/js/common.js" charset="utf-8"></script>
<script src="/hmall/Public/Home/js/jquery-ui/jquery.ui.js" charset="utf-8"></script>
<script src="/hmall/Public/Home/js/jquery.validation.min.js" charset="utf-8"></script>
<script src="/hmall/Public/Home/js/jquery.masonry.js" charset="utf-8"></script>
<script src="/hmall/Public/Home/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>
<link href="/hmall/Public/Home/js/dialog/dialog.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var PRICE_FORMAT = '&yen;%s';
$(function(){
	//首页左侧分类菜单
	$(".category ul.menu").find("li").each(
		function() {
			$(this).hover(
				function() {
				    var cat_id = $(this).attr("cat_id");
					var menu = $(this).find("div[cat_menu_id='"+cat_id+"']");
					menu.show();
					$(this).addClass("hover");
					if(menu.attr("hover")>0) return;
					menu.masonry({itemSelector: 'dl'});
					var menu_height = menu.height();
					if (menu_height < 60) menu.height(80);
					menu_height = menu.height();
					var li_top = $(this).position().top;
					if ((li_top > 60) && (menu_height >= li_top)) $(menu).css("top",-li_top+50);
					if ((li_top > 150) && (menu_height >= li_top)) $(menu).css("top",-li_top+90);
					if ((li_top > 240) && (li_top > menu_height)) $(menu).css("top",menu_height-li_top+90);
					if (li_top > 300 && (li_top > menu_height)) $(menu).css("top",60-menu_height);
					if ((li_top > 40) && (menu_height <= 120)) $(menu).css("top",-5);
					menu.attr("hover",1);
				},
				function() {
					$(this).removeClass("hover");
				    var cat_id = $(this).attr("cat_id");
					$(this).find("div[cat_menu_id='"+cat_id+"']").hide();
				}
			);
		}
	);
	$(".head-user-menu dl").hover(function() {
		$(this).addClass("hover");
	},
	function() {
		$(this).removeClass("hover");
	});
	$('.head-user-menu .my-mall').mouseover(function());
	$('.head-user-menu .my-cart').mouseover(function());
	$('#button').click(function(){
	    if ($('#keyword').val() == '') {
		    return false;
	    }
	});
    });

$(function(){
	//search
	var act = "index";
	if (act == "store_list"){
		$("#search").children('ul').children('li:eq(1)').addClass("current");
		$("#search").children('ul').children('li:eq(0)').removeClass("current");
		}
	$("#search").children('ul').children('li').click(function(){
		$(this).parent().children('li').removeClass("current");
		$(this).addClass("current");
		$('#search_act').attr("value",$(this).attr("act"));
		$('#keyword').attr("placeholder",$(this).attr("title"));
	});
	$("#keyword").blur();
});
</script>
</head>

<body scroll="no">
	<div class="public-top-layout w">
	  <div class="topbar wrapper">
	    <div class="user-entry">
	            您好，欢迎来到 <a href="<?php echo U('index');?>" title="首页" alt="首页">皇家马球俱乐部</a>
	      <!--span style="margin-left:10px;"><a href="index.php?act=invite" style="color:red;">邀请返利</a></span-->
	    </div>
	    <div class="quick-menu">
	      <dl>
	        <dt><a href="http://192.168.0.110/b2b2c/shop/index.php?act=login&amp;op=register">新用户注册</a></dt>
	      </dl>
		  <dl>
	        <dt><a href="http://192.168.0.110/b2b2c/shop/index.php?act=login&amp;op=logout">用户登陆</a></dt>
	      </dl>
	            <dl>
	        <dt><a href="http://192.168.0.110/b2b2c/shop/index.php?act=member_order">我的订单</a><i></i></dt>
	        <dd>
	          <ul>
	            <li><a href="http://192.168.0.110/b2b2c/shop/index.php?act=member_order&amp;state_type=state_new">待付款订单</a></li>
	            <li><a href="http://192.168.0.110/b2b2c/shop/index.php?act=member_order&amp;state_type=state_send">待确认收货</a></li>
	            <li><a href="http://192.168.0.110/b2b2c/shop/index.php?act=member_order&amp;state_type=state_noeval">待评价交易</a></li>
	          </ul>
	        </dd>
	      </dl>
	    </div>
	  </div>
	</div>
	<div class="header-wrap">
	  <header class="public-head-layout wrapper">
	    <h1 class="site-logo"><a href="http://192.168.0.110/b2b2c"><img src="/hmall/Public/Home/images/common/shop/04959049021862520.png" class="pngFix"></a></h1>
	    <div class="head-app"><span class="pic"></span>
	    </div>
	        
	    <div id="search" class="head-search-bar">
		<!--商品和店铺-->
	      <ul class="tab">
	        <li title="请输入您要搜索的商品关键字" act="search" class="current">商品</li>
	        <li title="请输入您要搜索的店铺关键字" act="store_list">店铺</li>
	      </ul>
	      <form class="search-form" method="get" action="http://192.168.0.110/b2b2c/shop">
	        <input type="hidden" value="search" id="search_act" name="act">
	         <input placeholder="请输入您要搜索的商品关键字" name="keyword" id="keyword" type="text" class="input-text" value="" maxlength="60" x-webkit-speech="" lang="zh-CN" onwebkitspeechchange="foo()" x-webkit-grammar="builtin:search">
	        <input type="submit" id="button" value="搜索" class="input-submit">
	      </form>
	    </div>
	    <div class="head-user-menu">
	      <dl class="my-mall">
	        <dt><span class="ico"></span>我的商城<i class="arrow"></i></dt>
	        <dd>
	          <div class="sub-title">
	            <h4>                        
	            </h4>
	            <a href="http://192.168.0.110/b2b2c/shop/index.php?act=member&amp;op=home" class="arrow">我的用户中心<i></i></a></div>
	          <div class="user-centent-menu">
	            <ul>
	              <li><a href="http://192.168.0.110/b2b2c/shop/index.php?act=member_order" class="arrow">我的订单<i></i></a></li>
	              <li><a href="http://192.168.0.110/b2b2c/shop/index.php?act=member_favorites&amp;op=fglist" class="arrow">我的收藏<i></i></a></li>
	                                          <li><a href="http://192.168.0.110/b2b2c/shop/index.php?act=member_points" class="arrow">我的积分<i></i></a></li>
	                          </ul>
	          </div>
	        </dd>
	      </dl>
	      <dl class="my-cart">
	                <dt><span class="ico"></span>购物车结算<i class="arrow"></i></dt>
	        <dd>
	          <div class="sub-title">
	            <h4>最新加入的商品</h4>
	          </div>
	          <div class="incart-goods-box">
	            <div class="incart-goods"><div class="no-order"><span>您的购物车中暂无商品，赶快选择心爱的商品吧！</span></div></div>
	          </div>
	          <div class="checkout"> <span class="total-price"></span><a href="http://192.168.0.110/b2b2c/shop/index.php?act=cart" class="btn-cart">结算购物车中的商品</a> </div>
	        </dd>
	      </dl>
	    </div>
	  </header>
	</div>
	<nav class="public-nav-layout">
	  <div class="wrapper">
	    <div class="all-category">
	      
	      <div class="title">
		  <i></i>
	        <h3><a href="http://192.168.0.110/b2b2c/shop/index.php?act=category&amp;op=index">所有商品分类</a></h3>
	        </div>
	      <div class="category">
	        <ul class="menu">
	        <?php if(is_array($list_tree)): $i = 0; $__LIST__ = $list_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li cat_id="<?php echo ($list["gc_id"]); ?>" class="<?php if($mod == 1): ?>odd<?php else: ?>even<?php endif; ?>">
		            <div class="class">
		                <h4><a href="<?php echo U('cate/index',array('cate_id'=>$list['gc_id']));?>"><?php echo ($list["gc_name"]); ?></a></h4>
						<span class="arrow"></span>
					</div>
		            <div class="sub-class masonry" cat_menu_id="1" hover="1" style="display: none; position: relative; height: 524px;">
		            <?php if(!empty($list["son"])): if(is_array($list["son"])): foreach($list["son"] as $key=>$son): ?><dl class="masonry-brick" style="position: absolute; top: 0px; left: 7px;">
			                <dt>
			                	<h3><a href="<?php echo U('cate/index',array('cate_id'=>$son['gc_id']));?>"><?php echo ($son["gc_name"]); ?></a></h3>
			                </dt>
			                <dd class="goods-class">
			                <?php if(!empty($son["son"])): if(is_array($son["son"])): foreach($son["son"] as $key=>$grandson): ?><a href="<?php echo U('cate/index',array('cate_id'=>$grandson['gc_id']));?>"><?php echo ($grandson["gc_name"]); ?></a><?php endforeach; endif; endif; ?>
			                </dd>
		                </dl><?php endforeach; endif; endif; ?>
			         </div>
	          	</li><?php endforeach; endif; else: echo "" ;endif; ?>
	          </ul>
	      </div>
		</div>
	    <ul class="site-menu">
	      <li><a href="http://192.168.0.110/b2b2c" class="current">首页</a></li>
	      <li><a href="http://192.168.0.110/b2b2c/shop/index.php?act=brand&amp;op=index"> 品牌</a></li>
	      <li><a href="/shop/index.php?act=store_list&amp;op=index">店铺</a></li>
	    </ul>
	  </div>
	</nav>
 <div class="nch-breadcrumb-layout">
	<div class="nch-breadcrumb wrapper"><i class="icon-home"></i>
           <span><a href="http://192.168.0.110/b2b2c/shop">首页</a></span><span class="arrow">&gt;</span>
           <span><a href="http://192.168.0.110/b2b2c/shop/index.php?act=search&amp;op=index&amp;cate_id=1">服饰鞋帽</a></span><span class="arrow">&gt;</span>
           <span><a href="http://192.168.0.110/b2b2c/shop/index.php?act=search&amp;op=index&amp;cate_id=4">女装</a></span><span class="arrow">&gt;</span>
           <span><a href="http://192.168.0.110/b2b2c/shop/index.php?act=search&amp;op=index&amp;cate_id=14">针织衫</a></span><span class="arrow">&gt;</span>
           <span>春装 披肩式 超短款 针织 衫开衫 女装 青鸟 绿色</span>
	</div>
</div>
<link href="http://192.168.0.110/b2b2c/shop/templates/default/css/home_goods.css" rel="stylesheet" type="text/css">
<style type="text/css">
.ncs-goods-picture .levelB, .ncs-goods-picture .levelC { cursor: url(http://192.168.0.110/b2b2c/shop/templates/default/images/shop/zoom.cur), pointer;}
.ncs-goods-picture .levelD { cursor: url(http://192.168.0.110/b2b2c/shop/templates/default/images/shop/hand.cur), move\9;}
</style>
<div id="content" class="wrapper pr">
    <input type="hidden" id="lockcompare" value="unlock">
  <div class="ncs-detail">
    <!-- S 商品图片 -->
    <div id="ncs-goods-picture" class="ncs-goods-picture image_zoom"><div class="gallery_wrap" style="height: 360px; width: 360px; position: relative; overflow: hidden;"><div class="gallery levelB" style="position: absolute; overflow: hidden; opacity: 1; height: 320px; width: 320px; left: 20px; top: 20px;"><img src="http://192.168.0.110/b2b2c/data/upload/shop/common/default_goods_image_360.gif" alt="" style="height: 320px; width: 320px;"></div><div class="gallery gallery_mask" style="position: absolute; overflow: hidden; opacity: 1; height: 320px; width: 320px; left: 20px; top: 20px; display: none;"><img src="http://192.168.0.110/b2b2c/data/upload/shop/common/default_goods_image_360.gif" alt="" style="height: 320px; width: 320px;"></div></div><div class="controller_wrap"><div class="controller"><ul><li><a href="javascript:;" data-index="0" class="current"><img src="http://192.168.0.110/b2b2c/data/upload/shop/store/goods/1/1_04418240378724556_60.jpg" height="60" width="60" alt=""></a></li><li><a href="javascript:;" data-index="1"><img src="http://192.168.0.110/b2b2c/data/upload/shop/store/goods/1/1_04418240412383742_60.jpg" height="60" width="60" alt=""></a></li><li><a href="javascript:;" data-index="2"><img src="http://192.168.0.110/b2b2c/data/upload/shop/store/goods/1/1_04418240440076521_60.jpg" height="60" width="60" alt=""></a></li><li><a href="javascript:;" data-index="3"><img src="http://192.168.0.110/b2b2c/data/upload/shop/store/goods/1/1_04418240469700467_60.jpg" height="60" width="60" alt=""></a></li></ul></div><a href="javascript:;" class="prev"><span>«</span></a><a href="javascript:;" class="next"><span>»</span></a></div><div class="close_wrap"><a href="javascript:;" class="close" style="display: none;">×</a></div></div>
    <!-- S 商品基本信息 -->
    <div class="ncs-goods-summary">
      <div class="name">
        <h1><?php echo ($goods_info['goods_name']); ?></h1>
        <strong></strong> </div>
      <div class="ncs-meta">
        <!-- S 商品发布价格 -->
        <dl>
          <dt>商品价格：</dt>
          <dd class="price">
                                    <strong>¥<?php echo ($goods_info['goods_price']); ?></strong>
                      </dd>
        </dl>
        <!-- E 商品发布价格 -->
      </div>
            <div class="ncs-key">
        <!-- S 商品规格值-->
                        <dl nctype="nc-spec">
          <dt>颜色：</dt>
          <dd>
                        <ul nctyle="ul_sign">
                                          <!-- 图片类型规格-->
              <li class="sp-img"><a href="javascript:void(0);" class="hovered" data-param="{valid:239}" title="绿色"><img src="http://192.168.0.110/b2b2c/data/upload/shop/store/goods/1/1_04418240378724556_60.jpg">绿色<i></i></a></li>
                                                        <!-- 图片类型规格-->
              <li class="sp-img"><a href="javascript:void(0);" class="" data-param="{valid:240}" title="梅红"><img src="http://192.168.0.110/b2b2c/data/upload/shop/store/goods/1/1_04418240641767556_60.jpg">梅红<i></i></a></li>
                                                        <!-- 图片类型规格-->
              <li class="sp-img"><a href="javascript:void(0);" class="" data-param="{valid:241}" title="蓝色"><img src="http://192.168.0.110/b2b2c/data/upload/shop/store/goods/1/1_04418240795665638_60.jpg">蓝色<i></i></a></li>
                                                        <!-- 图片类型规格-->
              <li class="sp-img"><a href="javascript:void(0);" class="" data-param="{valid:242}" title="黑色"><img src="http://192.168.0.110/b2b2c/data/upload/shop/store/goods/1/1_04418240955916042_60.jpg">黑色<i></i></a></li>
                                                        <!-- 图片类型规格-->
              <li class="sp-img"><a href="javascript:void(0);" class="" data-param="{valid:243}" title="橙色"><img src="http://192.168.0.110/b2b2c/data/upload/shop/store/goods/1/1_04418241398474746_60.jpg">橙色<i></i></a></li>
                                                        <!-- 图片类型规格-->
              <li class="sp-img"><a href="javascript:void(0);" class="" data-param="{valid:228}" title="灰色"><img src="http://192.168.0.110/b2b2c/data/upload/shop/store/goods/1/1_04418242684128103_60.jpg">灰色<i></i></a></li>
                                        </ul>
                      </dd>
        </dl>
                        <!-- E 商品规格值-->
                                <!-- S 购买数量及库存 -->
                <dl>
          <dt>购买数量：</dt>
          <dd class="ncs-figure-input">

            <input type="text" name="" id="quantity" value="1" size="3" maxlength="6" class="text w30">
                        <a href="javascript:void(0)" class="increase">+</a><a href="javascript:void(0)" class="decrease">-</a> <span>(当前库存<em nctype="goods_stock"><?php echo ($goods_info['goods_storage']); ?></em>件            <!-- 虚拟商品限购数 -->
                        )</span>          </dd>
        </dl>
                <!-- E 购买数量及库存 -->
      </div>
      <!-- S 购买按钮 -->
        <div class="ncs-btn"><!-- S 提示已选规格及库存不足无法购买 -->
          <div nctype="goods_prompt" class="ncs-point">
                        <span class="yes">已选择 <strong>绿色</strong></span>
                                  </div>
          <!-- E 提示已选规格及库存不足无法购买 -->
          <!-- S到货通知 -->
                    <!-- E到货通知 -->
          <div class="clear"></div>
          
          <!-- 预约 -->
                    <!-- 立即购买-->
          <a href="javascript:void(0);" nctype="buynow_submit" class="buynow " title="立即购买">立即购买</a>
                    <!-- 加入购物车-->
          <a href="javascript:void(0);" nctype="addcart_submit" class="addcart " title="添加购物车"><i class="icon-shopping-cart"></i>添加购物车</a>
          
          <!-- S 加入购物车弹出提示框 -->
          <div class="ncs-cart-popup">
            <dl>
              <dt>成功添加到购物车<a title="关闭" onclick="$('.ncs-cart-popup').css({'display':'none'});">X</a></dt>
              <dd>购物车共有 <strong id="bold_num"></strong> 种商品 总金额为：<em id="bold_mly" class="saleP"></em></dd>
              <dd class="btns"><a href="javascript:void(0);" class="ncs-btn-mini ncs-btn-green" onclick="location.href='http://192.168.0.110/b2b2c/shop/index.php?act=cart'">查看购物车</a> <a href="javascript:void(0);" class="ncs-btn-mini" value="" onclick="$('.ncs-cart-popup').css({'display':'none'});">继续购物</a></dd>
            </dl>
          </div>
          <!-- E 加入购物车弹出提示框 -->

        </div>
        <!-- E 购买按钮 -->
            <!--E 商品信息 -->

    </div>

    <!--S 店铺信息-->
    <div style=" position: absolute; z-index: 1; top: -1px; right: -1px;">
      <!--店铺基本信息 S-->

<div class="ncs-info">
  <div class="title">
    <h4>官方店铺测试</h4>
  </div>
  <div class="content"> 
    <dl class="no-border">
        <dt>联系电话：</dt>
        <dd>13767960831</dd>
    </dl>
        <dl class="no-border">
        <dt>公司名称：</dt>
        <dd></dd>
    </dl>
    <dl>
        <dt>公司地址：</dt>
        <dd></dd>
    </dl>

    <div class="goto"><a href="http://192.168.0.110/b2b2c/shop/index.php?act=show_store&amp;op=index&amp;store_id=1">进入商家店铺</a></div>
  </div>
</div>

<script>
$(function(){
	var store_id = "1";
	var goods_id = "46";
	var act = "goods";
	var op  = "index";
	$.getJSON("index.php?act=show_store&op=ajax_flowstat_record",{store_id:store_id,goods_id:goods_id,act_param:act,op_param:op});
});
</script>
    </div>
    <!--E 店铺信息 -->
    <div class="clear"></div>
  </div>
  <div class="ncs-goods-layout expanded">
    <div class="ncs-goods-main" id="main-nav-holder">
      <div class="tabbar pngFix" id="main-nav">
        <div class="ncs-goods-title-nav">
          <ul id="categorymenu">
            <li class="current"><a id="tabGoodsIntro" href="#content">商品详情</a></li>
          </ul>
          <div class="switch-bar"><a href="javascript:void(0)" id="fold">&nbsp;</a></div>
        </div>
      </div>
      <div class="ncs-intro">
        <div class="content bd" id="ncGoodsIntro">
           <div class="ncs-goods-info-content">
               <?php echo (htmlspecialchars_decode($goods_info['goods_content'])); ?>
          </div>
        </div>
      </div>
          </div>
    <div class="ncs-sidebar">
      <div class="ncs-message-bar">
  <div class="default">
    <h5>官方店铺测试</h5>
    <span member_id="1"></span>
          </div>
  </div>
    </div>
  </div>
</div>
	<div id="faq">
	  <div class="faq-wrapper">
	    <ul>
	           <li> <dl class="s1">
	      <dt>
	        帮助中心      </dt>
	                  <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=10" title="查看已购买商品"> 查看已购买商品 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=7" title="如何搜索"> 如何搜索 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=40" title="积分兑换说明"> 积分兑换说明 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=9" title="我要买"> 我要买 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=6" title="如何注册成为会员"> 如何注册成为会员 </a></dd>
	                </dl></li>
	               <li> <dl class="s2">
	      <dt>
	        店主之家      </dt>
	                  <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=13" title="如何发货"> 如何发货 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=15" title="如何申请开店"> 如何申请开店 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=12" title="查看售出商品"> 查看售出商品 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=14" title="商城商品推荐"> 商城商品推荐 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=11" title="如何管理店铺"> 如何管理店铺 </a></dd>
	                </dl></li>
	               <li> <dl class="s3">
	      <dt>
	        支付方式      </dt>
	                  <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=16" title="如何注册支付宝"> 如何注册支付宝 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=28" title="分期付款"> 分期付款 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=30" title="公司转账"> 公司转账 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=17" title="在线支付"> 在线支付 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=29" title="邮局汇款"> 邮局汇款 </a></dd>
	                </dl></li>
	               <li> <dl class="s4">
	      <dt>
	        售后服务      </dt>
	                  <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=33" title="返修/退换货"> 返修/退换货 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=26" title="联系卖家"> 联系卖家 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=32" title="退换货流程"> 退换货流程 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=34" title="退款申请"> 退款申请 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=31" title="退换货政策"> 退换货政策 </a></dd>
	                </dl></li>
	               <li> <dl class="s5">
	      <dt>
	        客服中心      </dt>
	                  <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=21" title="修改收货地址"> 修改收货地址 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=18" title="会员修改密码"> 会员修改密码 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=20" title="商品发布"> 商品发布 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=19" title="会员修改个人资料"> 会员修改个人资料 </a></dd>
	                </dl></li>
	               <li> <dl class="s6">
	      <dt>
	        关于我们      </dt>
	                  <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=24" title="招聘英才"> 招聘英才 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=23" title="联系我们"> 联系我们 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=25" title="合作及洽谈"> 合作及洽谈 </a></dd>
	            <dd><i></i><a href="http://192.168.0.110/b2b2c/shop/index.php?act=article&amp;op=show&amp;article_id=22" title="关于我们"> 关于我们 </a></dd>
	                </dl></li>
	        	    	
		</ul>	
	<div class="help">
			<div class="w1190 clearfix">
	    		<div class="contact f-l">
	    			<div class="contact-border clearfix">
	        			<span class="ic tel t20">188-5978-9699</span>
	        			<span class="ic mail"></span>
	        			<div class="attention cleafix">
	        				<div class="weixin f-l">						
	    <img src="/hmall/Public/Home/images/common/shop/04951943379528830.png" class="f-l jImg img-error">
		   					<p class="f-l">
	        						<span>扫一扫</span>
	        						<span>关注我们</span>
	        					</p>
	        				</div>
	        				<div class="weibo f-l">
	        					<div class="ic qq" style="padding-left: 0px;"><ul><li><a target="_blank">腾讯微博</a></li></ul></div>
	        					<div class="ic sina" style="padding-left: 0px;"><ul><li><a target="_blank">新浪微博</a></li></ul></div>
	        				</div>
	        			</div>
	    			</div>
	    		</div>
			</div>
		</div>			
	      </div>
	</div>
	<div id="footer" class="wrapper">
	  <p><a href="http://192.168.0.110/b2b2c/shop">首页</a>
	                | <a href="/shop/index.php?act=article&amp;article_id=24">招聘英才</a>
	                | <a href="/shop/index.php?act=article&amp;article_id=25">合作及洽谈</a>
	                | <a href="/shop/index.php?act=article&amp;article_id=23">联系我们</a>
	                | <a href="/shop/index.php?act=article&amp;article_id=22">关于我们</a>
	                        | <a href="/shop/index.php?act=link">友情链接</a>
	                              </p>
	  Copyright 2015 <br>
	   </div>
 	</body>
 </html>