<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="bf-breadcrumb-wrapper boxed">
<div class="container bf-breadcrumb-container">
<div class="bf-breadcrumb breadcrumbs bf-clearfix">
<span class="trail-begin"><a href="<?php echo BLOG_URL; ?>" rel="home"><i class="fa fa-home"></i> 首页</a></span>
<span class="sep"><i class="fa fa-angle-double-right"></i></span> <span class="trail-end"><?php echo $log_title; ?></span>
</div>
</div>
</div>
<main id="content" class="content-container container">
<div class="row main-section">
<div class="main-content col-lg-12 col-md-12 col-sm-8 col-xs-12 with-sidebar content-column"> 
<article id="post" class="post type-post status-publish format-standard has-post-thumbnail category-bussinus category-entertainment category-miscellaneous single-content clearfix" >
<h1 class="post-title page-heading">
<span class="h-title"><?php echo $log_title; ?></span></h1>
<div class="the-content post-content clearfix">
<?php if ($video == "1"): ?>
<div class="featured">
<div class="fluid-width-video-wrapper">
<div id="a1"></div>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/ckplayer.js" charset="utf-8"></script>
</div>
</div>
<?php elseif ($video == "2"): ?> 
<?php endif; ?> 
<?php echo $log_content; ?>
<?php doAction('log_related', $logData); ?>
</div>
<br />
</article>
<div class="comments">
<div id="comments"> 
<?php blog_comments($comments); ?>
<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
</main>
<?php
 include View::getView('footer');
?>