<?php 
/**
 * 站点论坛模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="bf-breadcrumb-wrapper boxed">
<div class="container bf-breadcrumb-container">
<div class="bf-breadcrumb breadcrumbs bf-clearfix">
<span class="trail-begin"><a href="<?php echo BLOG_URL; ?>" rel="home"><i class="fa fa-home"></i> 首页</a></span>
<span class="sep"><i class="fa fa-angle-double-right"></i></span> <?php 
     $ery = mysql_query("SELECT * FROM ".DB_PREFIX."sort WHERE sid ='$sortid'"); $rest = mysql_fetch_array($ery); if($rest['pid'] == "0"){
   echo '<a href="'.Url::sort($rest['sid']).'">'.$rest['sortname'].'</a>'; 
  }else{
  $ery1 = mysql_query("SELECT * FROM ".DB_PREFIX."sort WHERE sid ='".$rest['pid']."'"); $rest1 = mysql_fetch_array($ery1); echo '<a href="'.Url::sort($rest1['sid']).'">'.$rest1['sortname'].'</a>'; echo ' <b>></b> <a href="'.Url::sort($rest['sid']).'">'.$rest['sortname'].'</a>';}
    ?>
<span class="sep"><i class="fa fa-angle-double-right"></i></span> <span class="trail-end"><?php echo $log_title; ?></span>
</div>
</div>
</div>
<main id="content" class="content-container container">
<div class="row main-section">
<div class="main-content col-lg-8 col-md-8 col-sm-8 col-xs-12 with-sidebar content-column" > 
<article id="post" class="post type-post status-publish format-standard has-post-thumbnail category-bussinus category-entertainment category-miscellaneous single-content clearfix" >
<?php if ($video == "1"): ?>
<div class="featured">
<?php if (is_mobile() ): ?>
<div class="fluid-width-video-wrapper">
<?php else:?>
<div class="fluid-width-video-wrapper" style="padding-top: 56.2393%;">
<?php endif ;?>
<?php doAction('log_related', $logData); ?>
<div id="a1"></div>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/ckplayer.js" charset="utf-8"></script>
</div>
</div>
<?php elseif ($video == "2"): ?> 
<?php endif; ?>
<h1 class="post-title page-heading" itemprop="headline">
<span class="h-title"><?php echo $log_title; ?></span></h1>
<div class="post-meta meta ">
<span class="time">
<span class="fontzoom"><a href="javascript:fontSizetoB();" title="加大字号">A<sup>+</sup></a><a href="javascript:fontSizetoS();" title="减小字号">A<sup>-</sup></a></span>
</span>
<span class="views" ><i class="fa fa-eye"></i><?php echo $views; ?> 浏览</span>
<a class="comments" ><i class="fa fa-comment-o"></i> <?php if($comnum):?>评论(<?php echo $comnum; ?>)<?php else:?>评论：暂无<?php endif;?></a>
</div>
<div class="the-content post-content clearfix">
<?php echo $log_content; ?>
<?php doAction('log_related', $logData); ?>
</div>
<br />
<div class="entry-terms the-content">
<p class="terms-list">
<span class="fa fa-tag"></span> <?php blog_tag($logid); ?></p></div> 
</article>
<section class="share-box clearfix  ">
 <?php if ($fo2_ad_3 == "1"): ?> 
<div class="bf-shortcode bf-advertisement-code">
<?php echo $fo3_ad3; ?>
<br/>
</div>
 <?php endif;?>
<div class="post-link-share">
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/share.js'></script>
<div class="bdsharebuttonbox bdshare-button-style0-16">
			<a title="分享到新浪微博" class="bds_tsina fa fa-weibo" href="#" data-cmd="tsina"></a>
			<a title="分享到QQ空间" class="bds_qzone fa fa-star" href="#" data-cmd="qzone"></a>
			<a title="分享到腾讯微博" class="bds_tqq fa fa-tencent-weibo" href="#" data-cmd="tqq"></a>
			<a title="分享到QQ好友" class="qq fa fa-qq" href="#" data-cmd="sqq"></a>
			<a title="分享到人人网" class="bds_renren fa fa-renren" href="#" data-cmd="renren"></a>
			<a title="分享到微信" class="bds_weixin fa fa-weixin" href="#" data-cmd="weixin"></a>
		</div>
	</div>
</section>
<section class="post-author block-user-row clearfix single-post-author" >
<div class="section-heading extended clearfix ">
<h4>
 <?php global $CACHE;$user_cache = $CACHE->readCache('user');$name = $user_cache[$author]['mail'] != '' ? "".$user_cache[$author]['name']."" : $user_cache[1]['name'];?>
<span class="h-title"><?php blog_author($author); ?></span></h4>
</div>
<span class="post-author-avatar">
<?php if($user_cache[$author]['photo']['src']):?><?php global $CACHE;$user_cache = $CACHE->readCache('user'); if (!empty($user_cache[$author]['photo']['src'])): ?><img src="<?php echo BLOG_URL.$user_cache[$author]['photo']['src']; ?>" class="avatar avatar-80 wp-user-avatar wp-user-avatar-80 alignnone photo" width="80" height="80"><?php endif; ?><?php else:?><img src="<?php echo getGravatar($user_cache[$author]['mail']); ?>" class="avatar avatar-80 wp-user-avatar wp-user-avatar-80 alignnone photo" width="80" height="80"><?php endif; ?>
</span>
<div class="post-author-bio the-content" itemprop="description">
<ul class="spostinfo">
<li><strong>版权声明：</strong>本文章发表于 <?php echo gmdate('Y-n-j G:i', $date); ?> ，由 <?php blog_author($author); ?> 发布</li>
<li class="cop"><strong>转载注明：</strong><a href="<?php echo $val['url']; ?>" rel="bookmark"><?php echo $log_title; ?></a>
<a href="<?php echo $val['url']; ?>" onclick="copyUrl(this.href);return false;" target="_self"> +复制链接</a></li>
<li class="cop"><strong>作者简介：</strong><?php if($user_cache[$author]['des']):?><?php echo $user_cache[$author]['des']; ?><?php else:?>这个人很懒什么也没留！~<?php endif; ?></li>
</ul>
</div>
</section>
<div class="row block-listing navigate-posts style-1">
<?php neighbor_log($neighborLog); ?>
</div> 
<section class="related-posts clearfix">
<h4 class="section-heading ">
<span class="h-title">相关文章</span>
</h4>
<div class="row">
<?php related_logs($logData);?>
</div>
</section>
<div class="comments">
<div id="comments"> 
<?php blog_comments($comments); ?>
<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
<?php
 include View::getView('side');
?>
</main>