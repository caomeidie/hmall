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
	            您好<a href="<?php echo U('member/home');?>"><?php echo ($member_auth['member_name']); ?></a>，欢迎来到 <a href="<?php echo U('index');?>" title="首页" alt="首页">皇家马球俱乐部</a>
	      <?php if($member_auth): ?><a href="<?php echo U('login/logout');?>">退出</a><?php endif; ?>
	    </div>
	    <div class="quick-menu">
	    <?php if(!$member_auth): ?><dl>
	        <dt><a href="<?php echo U('login/regist');?>">新用户注册</a></dt>
	      </dl>
		  <dl>
	        <dt><a href="<?php echo U('login/index');?>">用户登陆</a></dt>
	      </dl><?php endif; ?>
	     <?php if($member_auth): ?><dl>
	        <dt><a href="<?php echo U('member/order');?>">我的订单</a><i></i></dt>
	      </dl><?php endif; ?>
	    </div>
	  </div>
	</div>
	<div class="header-wrap">
	  <header class="public-head-layout wrapper">
	    <h1 class="site-logo"><a href="<?php echo U('index');?>"><img src="/hmall/Public/Home/images/common/shop/04959049021862520.png" class="pngFix"></a></h1>
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
 <ul>
<?php if(is_array($goods_list)): foreach($goods_list as $key=>$goods): ?><li><a href="<?php echo U('goods/show',array('id'=>$goods['goods_id']));?>"><img src="/hmall/Public/upload/goods/<?php echo ($goods["goods_image"]); ?>" width="200" height="200" /></a><span><?php echo ($goods["goods_name"]); ?></span><span><?php echo ($goods["goods_price"]); ?></span></li><?php endforeach; endif; ?>
</ul>
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