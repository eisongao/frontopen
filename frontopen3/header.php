<?php
/*
Template Name:Frontopen3  
Description:全新样式,简单，六种模式，多种样式，自适应，在各种移动设备有良好的效果，此款是为拉人气而制作的版本
Version:1.0
Author:Flyer
Author Url:http://flyercn.ga
Sidebar Amount:1
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<?php if(!file_exists(EMLOG_ROOT."/content/templates/frontopen3/plus/locked.inc")){require_once View::getView('plus/frontopen');}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $site_title; ?></title>
<link rel='stylesheet' id='better-mag-css' href='<?php echo TEMPLATE_URL; ?>style.css?ver=2.7.0' type='text/css' media='all'/>
<link rel='stylesheet' id='better-social-counter-css' href='<?php echo TEMPLATE_URL; ?>css/style.css?ver=1.3.0' type='text/css' media='all'/>
<?php if ($layout == "3"): ?><link rel='stylesheet' id='bbp-default-css' href='<?php echo TEMPLATE_URL; ?>css/bbpress.css?ver=2.5.8-5815' type='text/css' media='all'/>
<?php endif;?><?php if ($layout == "0"): ?><link rel='stylesheet' id='bbp-default-css' href='<?php echo TEMPLATE_URL; ?>css/company.css?ver=2.5.8-5815' type='text/css' media='all'/><?php endif;?><?php if ($style == "1"): ?> 
<link rel='stylesheet' href='<?php echo TEMPLATE_URL; ?>css/style1.css?ver=2.5.8-5815' type='text/css' media='all'/>
<?php elseif ($style == "2"): ?> 
<link rel='stylesheet' href='<?php echo TEMPLATE_URL; ?>css/style2.css?ver=2.5.8-5815' type='text/css' media='all'/>
 <?php elseif ($style == "3"): ?> 
<link rel='stylesheet' href='<?php echo TEMPLATE_URL; ?>css/style3.css?ver=2.5.8-5815' type='text/css' media='all'/>
 <?php elseif ($style == "4"): ?> 
<link rel='stylesheet' href='<?php echo TEMPLATE_URL; ?>css/style4.css?ver=2.5.8-5815' type='text/css' media='all'/>
 <?php elseif ($style == "5"): ?> 
<link rel='stylesheet' href='<?php echo TEMPLATE_URL; ?>css/style5.css?ver=2.5.8-5815' type='text/css' media='all'/>
 <?php elseif ($style == "6"): ?> 
<link rel='stylesheet' href='<?php echo TEMPLATE_URL; ?>css/style6.css?ver=2.5.8-5815' type='text/css' media='all'/>
 <?php elseif ($style == "7"): ?> 
<link rel='stylesheet' href='<?php echo TEMPLATE_URL; ?>css/style7.css?ver=2.5.8-5815' type='text/css' media='all'/>
 <?php elseif ($style == "8"): ?> 
<link rel='stylesheet' href='<?php echo TEMPLATE_URL; ?>css/style8.css?ver=2.5.8-5815' type='text/css' media='all'/>
<?php endif;?>
<link rel='stylesheet' id='bootstrap-css' href='<?php echo TEMPLATE_URL; ?>css/bootstrap.min.css?ver=2.7.0' type='text/css' media='all'/>
<link rel='stylesheet' id='bf-fontawesome-css' href='<?php echo TEMPLATE_URL; ?>css/font-awesome.min.css?ver=2.4.3' type='text/css' media='all'/>
<link rel='stylesheet' id='bf-better-social-font-icon-css' href='<?php echo TEMPLATE_URL; ?>css/better-social-font-icon.css?ver=2.4.3' type='text/css' media='all'/>
<link rel='stylesheet' id='better-framework-main-fonts-css' href='<?php echo TEMPLATE_URL; ?>css/fonts.css' type='text/css' media='all'/>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/jquery.js?ver=1.11.3'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/jquery-migrate.min.js?ver=1.2.1'></script>
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<?php if ($zoom== "1"): ?> <script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/phzoom.js?ver=1.0.0'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/FancyZoomHTML.js?ver=1.0.0'></script>
<?php elseif ($zoom== "2"): ?><?php endif;?><script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/lazyload.min.js?ver=1.0.0'></script>
<?php if ($waterfall == "1"){?>
<link rel='stylesheet'  href='<?php echo TEMPLATE_URL; ?>css/waterfall.css' type='text/css' media='all'/>
<script src="<?php echo TEMPLATE_URL; ?>js/front.min.js"></script>
<script src="<?php echo TEMPLATE_URL; ?>js/waterfall.js"></script>
<?php }?>
<script src="<?php echo TEMPLATE_URL; ?>js/jquery.loadingbar.js"></script>
<link rel="shortcut icon" href="<?php echo TEMPLATE_URL; ?>img/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo TEMPLATE_URL; ?>img/iphone.png"> 
<!--[if lt IE 9]>
<script src="<?php echo TEMPLATE_URL; ?>js/html5shiv.min.js"></script>
<script src="<?php echo TEMPLATE_URL; ?>js/respond.min.js"></script>
<![endif]-->
<?php if ($logo == "1"): ?>
<style type="text/css">.logo{position:relative;overflow:hidden;margin:6px 0 0 10px;transition-duration:.3s}.logo:before{content:"";position:absolute;left:-165px;top:-160px;width:200px;height:15px;background-color:rgba(255,255,255,.5);-webkit-transform:rotate(-45deg);-moz-transform:rotate(-45deg);-ms-transform:rotate(-45deg);-o-transform:rotate(-45deg);transform:rotate(-45deg);-webkit-animation:searchLights 4s ease-in 0s infinite;-o-animation:searchLights 4s ease-in 0s infinite;animation:searchLights 4s ease-in 0s infinite}@-webkit-keyframes searchLights{0,75%{left:-100px;top:0}100%{left:120px;top:100px}}@-o-keyframes searchLights{0,75%{left:-100px;top:0}100%{left:120px;top:100px}}@-moz-keyframes searchLights{0,75%{left:-100px;top:0}100%{left:120px;top:100px}}@keyframes searchLights{0,75%{left:-100px;top:0}100%{left:120px;top:100px}} </style>    
<?php elseif ($logo == "2"): ?>
<?php endif;?>
</head> 
<body onLoad="setupZoom();" class="home page page-id-207 page-template-default animation_image_zoom enabled_back_to_top active-lighbox  active-emphasize-first-p boxed wpb-js-composer  vc_responsive">
<div class="loading"></div>
<div class="main-wrap">
<script type="text/javascript">loading('33%',350)</script>
<?php if ($topbar == "1"){?>
<div class="top-bar">
<div class="container">
<div class="row">
<div class="col-lg-6 col-sm-6 col-xs-12 top-bar-left clearfix">
<div id="nav_menu-3" class=" widget-havent-icon top-bar-widget widget widget_nav_menu">
<div class="menu-top-bar-menu-container">
<ul id="menu-top-bar-menu" class="menu">
<?php if(ROLE == 'admin' || ROLE == 'writer'){?>
<li id="menu-item-2" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children better-anim- menu-have-icon menu-item-730">
<a class="item-link item-link-3" href="<?php echo BLOG_URL; ?>admin">用户中心</a> 
<li id="menu-item-2" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children better-anim- menu-have-icon menu-item-730">
<a class="item-link item-link-3" href="<?php echo BLOG_URL; ?>admin/?action=logout">注销</a> 
<?php }else{ ?>
<?php if ($welcome == "1"): ?>
<li id="menu-item-1" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children better-anim- menu-have-icon menu-item-730">
<a class="item-link item-link-2 theme-login-zc" href="javascript:;">注册</a>  
</li>
<li id="menu-item-2" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children better-anim- menu-have-icon menu-item-730">
<a class="item-link item-link-3 theme-login" href="javascript:;">登录</a>        
</li>
<script>
jQuery(document).ready(function(){
  $(".theme-login").click(function(){$(".wsdl-mask").fadeToggle(100);$(".wsdl").fadeToggle("slow");});
  $(".theme-poptit .close1").click(function(){$(".wsdl-mask").fadeToggle();$(".wsdl").fadeToggle("slow");});
  $(".theme-login1").click(function(){$(".wszc-mask").fadeToggle(100);$(".wszc").fadeToggle("slow");});
  $(".theme-poptit .close2").click(function(){$(".wszc-mask").fadeToggle();$(".wszc").fadeToggle("slow");});
  $(".theme-login-zc").click(function(){
       $(".wsdl-mask").fadeToggle();$(".wsdl").fadeToggle("slow");
       $(".wszc-mask").fadeToggle(100);$(".wszc").fadeToggle("slow");
  });
  $(".theme-login-dl").click(function(){
       $(".wszc-mask").fadeToggle();$(".wszc").fadeToggle("slow");
       $(".wsdl-mask").fadeToggle(100);$(".wsdl").fadeToggle("slow");
  });
});
function login(){var nameValue=document.getElementById("user").value;var nameValue1=document.getElementById("pw").value; if (nameValue==''){alert("请输入账号");return false;}if (nameValue1==''){alert("请输入密码");return false;}}
function reg(){var nameValue=document.getElementById("username").value;var nameValue1=document.getElementById("nickname").value; var nameValue2=document.getElementById("password").value; var nameValue3=document.getElementById("password2").value; var nameValue4=document.getElementById("email").value; if (nameValue==''){alert("账号不能为空");return false;}   if (nameValue1==''){alert("昵称不能为空");return false;}if (nameValue2==''){alert("密码不能为空");return false;}               if (nameValue3==''){alert("重复密码不能为空");return false;}if (nameValue4==''){alert("邮箱不能为空");return false;}}
</script>
<div class="theme-popover wsdl">
<div class="theme-poptit">
<a href="javascript:;" title="关闭" class="close close1">×</a>
<h3 style="margin:0;padding:0">用户登陆</h3>
</div>
<div class="theme-popbod dform">
<form class="theme-signin" name="f" action="<?php echo BLOG_URL; ?>admin/index.php?action=login" method="post" onsubmit="return login()">
<ol>
<li>
<h4>你必须先登录！</h4>
</li>
<li>
<strong>用户名：</strong>
<input class="ipt" type="text" id="user" name="user" size="20" />
</li>
<li>
<strong>密码：</strong>
<input class="ipt" type="password" id="pw" name="pw" size="20" />
</li>
<li><input class="btn btn-primary" type="submit" name="submit" value=" 登 录 " />
<a class="theme-login-zc" style="margin-left:5px" href="javascript:;">没有账号？请注册</a>
</li>
</ol>
</form>
</div>
</div>
<div class="theme-popover-mask wsdl-mask"></div>
<div class="theme-popover wszc">
<div class="theme-poptit"><a href="javascript:;" title="关闭" class="close close2">×</a>
<h3 style="margin:0;padding:0">用户注册</h3></div><div class="theme-popbod dform">
<form style="margin:-70px -20px -50px 90px" class="theme-signin" action="" method="post" name="reg" onsubmit="return reg()">
<ol>
<li>
<strong>用户名：</strong>
<input class="ipt" type="text" id="username" name="username" size="20" /> *</li>
<li><strong>昵称：</strong><input class="ipt" type="text" id="nickname" name="username" size="20" /> *</li>
<li><strong>密码：</strong><input style="margin-bottom: 0;" class="ipt" type="password" id="password" name="password" size="20" /> *</li>
<li><strong>重复密码：</strong><input class="ipt" style="margin-bottom: 0;" type="password" id="password2" name="password2" size="20" /> *</li>
<li><strong>邮箱：</strong><input class="ipt" type="text" id="email" name="email" value="" size="20" /></li>
<li><input class="btn btn-primary" type="submit" name="submit" value=" 注 册 " /> 
<a class="theme-login-dl" style="margin-left:5px" href="javascript:;">已有账号？请登录</a>
</li>
</ol>
</form>
<?php
session_start();
!defined('EMLOG_ROOT') && exit('access deined!');
 if(ROLE == 'admin' || ROLE == 'writer'){header('Location:'.BLOG_URL.'admin/');}
global $CACHE;
$options_cache = $CACHE->readCache('options');
$DB = MySql::getInstance();
$username = isset($_POST['username']) ? addslashes(trim($_POST['username'])) : '';
$password = isset($_POST['password']) ? addslashes(trim($_POST['password'])) : '';
$password2 = isset($_POST['password2']) ? addslashes(trim($_POST['password2'])) : '';
$imgcode = isset($_POST['imgcode']) ? strtoupper(addslashes(trim($_POST['imgcode']))): '';
if($username && $password && $password2 && $imgcode ){
$sessionCode = isset($_SESSION['code']) ? $_SESSION['code'] : '';
//echo $sessionCode;
if($imgcode == $sessionCode){
$User_Model = new User_Model();
if(!$User_Model -> isUserExist($username)){
$hsPWD = new PasswordHash(8, true);
$password = $hsPWD->HashPassword($password);
$User_Model->addUser($username, $password, 'writer', 'y');
$CACHE->updateCache();
echo'<script>alert("注册成功！"); window.location.href="'.BLOG_URL.'admin/"</script>';
}else{echo'<script>alert("用户名已存在！");</script>';}
}else{echo'<script>alert("验证码错误！");</script>';}}
?>
</div>
</div>
<div class="theme-popover-mask wszc-mask"></div>
<?php elseif ($welcome == "2"): ?>
<li id="menu-item-1" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children better-anim- menu-have-icon menu-item-730">
<div class="wec">
站长温馨提示：
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/tip.js'></script>
</div>
</li>
<?php elseif ($welcome == "3"): ?>
<?php endif;?>
<?php };?>
</ul>
</div>
</div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12 top-bar-right clearfix">
<?php if ($social == "1"): ?>
<div class="better-studio-shortcode bsc-clearfix better-social-counter style-button colored in-4-col">
<ul class="social-list bsc-clearfix">
<li class="social-item weibo">
<a href="<?php echo $socialsina;?>" target="_blank">
<i class="item-icon fa fa-weibo"></i>
<span class="item-title">sina</span></a>
</li>
<li class="social-item webo">
<a href="<?php echo $socialweibo;?>" target="_blank">
<i class="item-icon fa fa-tencent-weibo"></i>
<span class="item-title">weibo</span>
</a>
</li>
</ul>
</div>
<?php elseif ($social == "2"): ?>
<?php endif;?>
<div id="better-news-ticker-2" class=" widget-havent-icon top-bar-widget widget widget_better-news-ticker">
<div class="bf-shortcode bf-news-ticker " data-time="9000">
<p class="heading ">本 站 通 知</p>
<ul class="news-list">
<?php echo get_newtwLI(4); ?>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<?php }else{?>
<?php }?>
<header id="header" class="header" role="banner" >
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 left-align-logo logo-container">
<div id="site-branding" class=" site-branding " >
<h1 id="site-title" class="logo" itemprop="headline">
<a href="<?php echo BLOG_URL; ?>" itemprop="url" rel="home">
<img src="<?php echo TEMPLATE_URL?>img/logo.png" alt="<?php echo $blogname; ?>" />
</a>
</h1>
<p id="site-description" class="site-description" ><?php echo $bloginfo; ?></p></div>
</div>
<?php if ($fo2_ad_1 == "1"): ?> 
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 left-align-logo aside-logo-sidebar">
<div id="advertisement-image-2" class=" widget-havent-icon aside-logo-widget widget widget_advertisement-image">
<div class="bf-shortcode bf-advertisement-code">
<?php echo $fo3_ad; ?>
</div>
</div>
</div>
<?php endif;?>
</div>
</div>
</header>
<div class="main-menu-sticky-wrapper"> <div id="menu-main" class="menu main-menu boxed sticky-menu style-normal">
<div class="container">
<nav class="main-menu-container desktop-menu-container">
<ul id="main-menu" class="menu">
<?php if ($caiji == "1"){ ?>
<li id="menu-item-4" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-title-hide better-anim- menu-have-icon menu-item-4">
<a href="<?php echo BLOG_URL; ?>"><i class="bf-icon  fa fa-home"></i>
<span class="hidden">首页</span></a>
</li>
<?php foreach($cate1_array as $k=>$c){?><li>
<a href="<?php echo  BLOG_URL;?>index.php?mode=list&cid=<?php echo $k;?>"><i class="bf-icon  fa fa-book"></i> <?php echo $c;?></a>
</li>
<?php } ?>
<li id="menu-item-178" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children  menu-have-icon menu-item-has-children menu-item-has-mega menu-item-178"><a href="#"><i class="bf-icon  fa fa-th-large"></i>  展开更多<span class="better-custom-badge ">Hot!</span></a>
<ul class="mega-menu style-link link-2-column">
<?php foreach($cate2_array as $k=>$c){ ?>
<li><a href="<?php echo  BLOG_URL?>index.php?mode=list&cid=<?php echo $k;?>"><?php echo $c;?></a></li><?php } ?>
</ul>
</li>
<?php }else{ ?>
<?php if ($fenlei == "1"): ?>
<li id="menu-item-4" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-title-hide better-anim- menu-have-icon menu-item-4">
<a href="<?php echo BLOG_URL; ?>"><i class="bf-icon  fa fa-home"></i>
<span class="hidden">首页</span></a>
</li>
<li id="menu-item" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children better-anim- menu-have-badge  menu-badge-right menu-have-icon menu-item-has-children menu-item-has-mega"><a href="#"><i class="bf-icon  fa fa-th-large"></i>  分类导航<span class="better-custom-badge ">Hot!</span></a>
<ul class="mega-menu style-link link-2-column">
<li id="menu-item" class="menu-item-type-custom menu-item-object-custom menu-item-has-children better-anim- menu-have-icon menu-item-has-children menu-item-has-mega menu-item">
<a href="#"><i class="bf-icon  fa fa-file-text"></i>主分类导航</a>
<ul class="sub-menu">
<?php
        global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); 
	foreach($sort_cache as $value):
	if ($value['pid'] != 0) continue;
?>
	<li id="menu-item-<?php echo $value['sid'];?>" class="menu-item menu-item-type-post_type menu-item-object-post better-anim- menu-have-badge  menu-badge-right menu-item-has-children menu-item-has-mega menu-item-<?php echo $value['sid'];?>">
	<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?> </a>	
	<?php endforeach; ?>
	</li>
</ul>
</li>
<li id="menu-item" class="menu-item-type-custom menu-item-object-custom menu-item-has-children better-anim- menu-have-icon menu-item-has-children menu-item-has-mega menu-item">
<a href="#"><i class="bf-icon  fa fa-file-text"></i> 小分类导航</a>
<ul class="sub-menu">
<?php
		global $CACHE;
	        $sort_cache = $CACHE->readCache('sort'); 
		if (!empty($value['pid'])):
		foreach($sort_cache as $value):
		if ($value['pid'] != 0) continue;
		$children = $value['children'];
		foreach ($children as $key):
		$value = $sort_cache[$key];
?>
<li id="menu-item-<?php echo $value['pid'];?>" class="menu-item menu-item-type-post_type menu-item-object-post better-anim- menu-have-badge  menu-badge-right menu-item-has-children menu-item-has-mega menu-item-<?php echo $value['pid'];?>">
<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?> </a>
</li>
<?php endforeach; ?>
<?php endforeach; ?>
<?php else:?>
<li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-post better-anim- menu-have-badge  menu-badge-right menu-item-has-children menu-item-has-mega">
你还没创建子分类,快去创建吧
</li>   
<?php endif; ?>
</ul>
</li>
</ul>
<?php elseif ($fenlei == "2"): ?>
<?php endif;?>
 <?php blog_navi();?>
<?php }?>
<li class="random-post menu-title-hide  alignright">
<a href="<?php echo rand_log(); ?>"><i class="fa fa-random"></i><span class="hidden">&nbsp;  手气不错</span></a>
</li>
<li class="search-item alignright">
<form  class="search-form" name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
<label>
<input type="search" class="search-field" placeholder="请输入搜索关键字……" value="" name="keyword" >
</label>
<input type="submit" class="search-submit" value="&#xf002;">
</form>
</li>
</ul>
</nav>
</div>
</div>
</div>
