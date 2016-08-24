<?php
/*
Template Name:Front Open 2
Description:中国原创 - 扁平风格的响应式网页模板，在任何设备上都能够完美的显示
Version:1.4.03.30
Author:Flyer Modify
Author Url:http://flyercn.com
Sidebar Amount:1
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
extract(_g());
require_once View::getView('module');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width , initial-scale=1.0 , user-scalable=0 , minimum-scale=1.0 , maximum-scale=1.0"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title><?php echo $site_title; ?></title>
<link rel="shortcut icon" href="/favicon.ico"/>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>jquery.js"></script>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo BLOG_URL; ?>rss.php" />
<?php if (isset($logid)) : ?>
<meta name="keywords" content="<?php log_key_words($logid); ?>" />
<?php elseif (isset($sortName)) : ?>
<meta name="keywords" content="<?php echo _g('sortKeywords.'.$sortid); ?>" />
<?php else : ?>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<?php endif; ?>
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="generator" content="emlog" />
<?php if ($menu == "yes"): ?><script type="text/javascript">(function(){mod_txt = '#text-5'; adminBar = "" || 0})();</script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>frontopen.js?ver=1.4.03.30"></script><?php else: ?><script type="text/javascript">(function(){mod_txt = '#text-5'; adminBar = "" || 0})();</script><script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>frontopen2.js?ver=1.4.03.30"></script>
<?php endif; ?><?php if (blog_tool_ishome()) :?><?php else:?><script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>jquery.qqFace.js"></script>
<script type="text/javascript">
$(function(){
	$('.comt-smilie').qqFace({
		id : 'facebox', //表情盒子的ID
		assign:'comment', //给那个控件赋值
		path:'<?php echo BLOG_URL; ?>admin/editor/plugins/emoticons/images/'	//表情存放的路径
	});
	
});
</script><?php endif; ?><link rel="stylesheet" type="text/css" media="all" href="<?php echo TEMPLATE_URL; ?>style.css?ver=1.4.03.30"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo TEMPLATE_URL; ?>mobile.css?ver=1.4.03.30"/>
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<style type="text/css">
@media screen and (min-width:1366px){.c-con{height:140px;}}
</style>
<?php if(_g('page_width')){?>
<style type="text/css">body{max-width:<?php echo _g('page_width'); ?>px; _width:<?php echo _g('page_width'); ?>px; margin:auto;}
<?php if(_g('page_width') < 1366){echo ".post_box {width:95%; height:auto;}.calendar td{padding:5px 7px;}";} ?>
@media screen and (max-width:960px){body{width:100%; margin:auto;}.post_box {width:100%; height:auto;}.main {width:100% !important;}.side {width:25%;} .page_php {width:72% !important;} #content {width: 75%;}}
<?php if(_g('page_width') <= 959){echo ".main {width:70%;}.side {width:30%;} .page_php {width: 67% !important;} #content {width: 70%;}";}?>
</style>
<?php }?>
<!--[if lt IE 9]>
<script src="<?php echo TEMPLATE_URL; ?>html5.js"></script>
<![endif]-->
<link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>css/font-awesome.min.css?ver=1.4.03.30">
<!--[if IE 7]>
<link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>css/font-awesome-ie7.min.css?ver=1.4.03.30">
<![endif]-->
<?php doAction('index_head'); ?>
</head>
<body class="home blog custom-background">
<div class="loading">
</div>
<div class="web_bod">
	<header class="header marauto">
    <?php if ($logoz == "yes"): ?>
    <span class="logo"><a href="<?php echo BLOG_URL; ?>" rel="home"><img src="<?php echo _g('logo'); ?>" alt="<?php echo $blogname; ?>"></a><i><?php echo $bloginfo; ?>
	</i></span>
    <?php else: ?>	
    <span class="logo">
        <a href="<?php echo BLOG_URL; ?>" title="<?php echo $blogname; ?>" rel="home"><b class="bclass"><?php echo $blogname; ?></b></a>
        <i><?php echo $bloginfo; ?></i>
    </span>
    <?php endif; ?>
	<form role="search" method="get" id="searchform" action="<?php echo BLOG_URL; ?>
		index.php"><span class="search"><input name="keyword" id="s" type="text" class="input" value="请输入关键词开始搜索吧" onclick="this.value = '';" style="color:#999" onkeypress="javascript:if(event.keyCode == 13){query(this.value);}" x-webkit-speech/><button id="searchsubmit" class="btn">SEARCH</button></span>
	</form>
	<div class="cls">
	</div>
	</header>
  <?php if ($tools == "yes"): ?>
	<div class="nav marauto">
		<div class="tig">
       <?php if (in_array('tougao', _g('dtg'))):?>
			<a href="<?php echo BLOG_URL; ?>?plugin=Submission" target="_self" rel="nofollow" title="投稿"><span class="sub">欢迎投稿</span></a>
       <?php else: ?>	
       <?php endif; ?>
       <?php if (in_array('dingyue', _g('dtg'))):?>
            <a href="javascript:;"><span id="rss_open" class="rrs">订阅RSS</span></a>
       			<div class="rss_box">
				<a class="close_rss" href="#"></a><span>邮件订阅</span><br>
				<br>
				<form class="subscribe-mail" action="http://list.qq.com/cgi-bin/qf_compose_send" target="_blank" method="post">
					<input type="hidden" name="t" value="qf_booked_feedback"><input type="hidden" name="id" value="<?php echo _g('qqding'); ?>"><input class="rss_input" id="to" name="to" type="email" placeholder="Your E-mail"><input class="rss_submit" type="submit" value="订阅">
				</form>
				<div class="ress_btn_box">
					订阅源：<a target="_blank" href="<?php echo BLOG_URL; ?>rss.php" rel="alternate" type="application/rss+xml" title="rss">RSS</a><a target="_blank" rel="external nofollow" href="http://mail.qq.com/cgi-bin/feed?u=<?php echo BLOG_URL; ?>">QQ邮箱</a><a target="_blank" rel="external nofollow" href="http://www.xianguo.com/subscribe.php?url=<?php echo BLOG_URL; ?>">鲜果</a><a target="_blank" rel="external nofollow" href="http://www.zhuaxia.com/add_channel.php?sourceid=102&url=<?php echo BLOG_URL; ?>">抓虾</a>
				</div>
			</div>
             <?php else: ?>	
<?php endif; ?>
 <?php if (in_array('gonggao', _g('dtg'))): ?>
			<div class="gonggao">
				<ul id="g_box">
					<?php global $CACHE;$newtws_cache = $CACHE->readCache('newtw');$istwitter = Option::get('istwitter');?><?php foreach($newtws_cache as $value): ?><li><span class="gg_tx"><i class="icon-volume-off icon-large"></i><?php echo preg_replace("/\[(\d+)\]/i",'<img src='.BLOG_URL.'content/plugins/face/face/${1}.gif />',$value['t'])?><a href="<?php echo BLOG_URL; ?>t">点击查看</a></span></li><?php endforeach; ?>
				</ul>
			</div>
             <?php else: ?>	
<?php endif; ?>
		</div>
       
		<div class="navlist">
           <?php if (in_array('dashiji', _g('stool'))):?>
			<dl>
				<dt><a href="<?php echo _g('dashiji'); ?>" title="大事记" target="_self" class="nav_button" style="opacity: 0.7;" rel="nofollow"><img src="<?php echo TEMPLATE_URL; ?>images/dsj.gif" width="45" height="45"></a></dt>
				<dd>EVENT</dd>
			</dl>
              <?php else: ?>	
              <?php endif; ?>
           <?php if (in_array('about', _g('stool'))):?>
			<dl>
           	<dt><a href="<?php echo _g('about'); ?>" title="关于" target="_self" class="nav_button" style="opacity: 0.7;" rel="nofollow"><img src="<?php echo TEMPLATE_URL; ?>images/nav_1.gif" width="45" height="45"></a></dt>
				<dd>ABOUT</dd>
			</dl>
             <?php else: ?>	
              <?php endif; ?>
            <?php if (in_array('contact', _g('stool'))):?>
			<dl>
				<dt><a href="<?php echo _g('contact'); ?>" title="联系站长" target="_self" class="nav_button" style="opacity: 0.7;" rel="nofollow"><img src="<?php echo TEMPLATE_URL; ?>images/conc.gif" width="45" height="45"></a></dt>
				<dd>CONTACT</dd>
			</dl>
            <?php else: ?>	
            <?php endif; ?>
            <?php if (in_array('other', _g('stool'))):?>
            <dl>
				<dt><a href="<?php echo _g('other'); ?>" title="其他" target="_self" class="nav_button" style="opacity: 0.7;" rel=""><img src="<?php echo TEMPLATE_URL; ?>images/other.gif" width="45" height="45"></a></dt>
				<dd>OTHER</dd>
			</dl>
      <?php else: ?>	
<?php endif; ?>
			<div class="cls">
			</div>
		</div>
              <?php else: ?>	
<?php endif; ?>
	</div>
<nav class="navcon marauto">
<div id="mobile_nav_btn">网站导航</div>
<div class="menu-header">
<ul id="menu-wplook-main-menu" class="menu">
			<?php blog_navi(); ?>
		</ul>
	</div>
	</nav>
    <section class="conter marauto">
    <script type="text/javascript">loading('33%',<?php echo _g('speed'); ?>)</script> 