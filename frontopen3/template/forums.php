<?php 
/**
 * 站点论坛模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php if(blog_tool_ishome()){ ?>
<?php }else{?>
<div class="bf-breadcrumb-wrapper boxed">
<div class="container bf-breadcrumb-container">
<div class="bf-breadcrumb breadcrumbs bf-clearfix">
<span class="trail-begin"><a href="<?php echo BLOG_URL; ?>" title="BETTERMAG" rel="home"><i class="fa fa-home"></i> 首页</a></span>
<span class="sep"><i class="fa fa-angle-double-right"></i></span>
<?php 
     $ery = mysql_query("SELECT * FROM ".DB_PREFIX."sort WHERE sid ='$sortid'"); $rest = mysql_fetch_array($ery);
	{
   echo '<a href="'.Url::sort($rest['sid']).'">'.$rest['sortname'].'</a>'; 
}
?>
</div>
</div>
</div>
<?php };?>
 <main id="content" class="content-container container">
 <div class="row main-section">
<div class="main-content col-lg-8 col-md-8 col-sm-8 col-xs-12 with-sidebar content-column" >
<?php if(blog_tool_ishome()){ ?>
<article class="post-0 type-forum status-publish  single-content">
<h1 class="post-title page-heading">
<span class="h-title">论坛</span></h1>
<div class="the-content  clearfix" >
<div id="bbpress-forums">
<div class="bbp-search-form clearfix">
<form name="keyform" method="get" id="bbp-search-form" action="<?php echo BLOG_URL; ?>index.php">
<div>
<input tabindex="101" type="text" placeholder="请输入搜索关键字……" value="" name="keyword" id="bbp_search">
<input tabindex="102" class="button" type="submit" id="bbp_search_submit" value="搜索">
</div>
</form>
</div>
<ul id="forums-list-0" class="bbp-forums">
<li class="bbp-body">
<?php
//栏目列表
function get_list($sort){
        $db = MySql::getInstance();
        $sql = "SELECT gid,title,date,content FROM ".DB_PREFIX."blog WHERE sortid=".$sort." AND hide='n' ORDER BY `date` DESC LIMIT 0,1";
        global $CACHE;
		$sort_cache = $CACHE->readCache('sort');
        $first = $db->query($sql);
                while($row = $db->fetch_array($first)){
$f = '<ul id="bbp-forum" class="loop-item odd bbp-parent-forum bbp-forum-status-open bbp-forum-visibility-publish post-26 forum type-forum status-publish hentry">
<li class="bbp-forum-info single-forum-info">
<a class="bbp-forum-title" href="'.Url::sort($sort).'">' . $sort_cache[$sort]['sortname'] . '</a>
<div class="bbp-forum-content the-content"><strong>'.$sort_cache[$sort]['description'].'</strong></div>
</li>
<li class="bbp-forum-topic-reply-count"><span class="count">共有</span><br/>
<span class="count">'.$sort_cache[$sort]['lognum'].'</span> 篇 </li>
<li class="bbp-forum-freshness">
<p class="bbp-topic-meta clearfix">
<span class="bbp-topic-freshness-author"><a href="'.Url::sort($sort).'"  class="bbp-author-avatar" rel="nofollow">
<img src="'.TEMPLATE_URL.'/img/bbs/icon-'.$sort.'.png" width="60" height="60"  class="avatar avatar-60 wp-user-avatar wp-user-avatar-60 alignnone photo"></a></span>
</p>
</li>
</ul> ';
 echo $f; $i++;  
}
}?>
<div class="category-forum">
<ul>
<li class="bbp-header">
<ul class="forum-titles">
<li class="bbp-forum-info"><?php echo $forumane1; ?></li>
<li class="bbp-forum-topic-reply-count">文章</li>
<li class="bbp-forum-freshness">板块</li>
</ul>
</li>
</ul>
</div>
<?php
foreach ($forumida as  $i) {
	echo get_list($i);
}
?>
<div class="category-forum">
<ul>
<li class="bbp-header">
<ul class="forum-titles">
<li class="bbp-forum-info"><?php echo $forumane2; ?></li>
<li class="bbp-forum-topic-reply-count">文章</li>
<li class="bbp-forum-freshness">板块</li>
</ul>
</li>
</ul>
</div>
<?php
foreach ($forumidb as  $i) {
	echo get_list($i);
}
?>
<div class="category-forum">
<ul>
<li class="bbp-header">
<ul class="forum-titles">
<li class="bbp-forum-info"><?php echo $forumane3; ?></li>
<li class="bbp-forum-topic-reply-count">文章</li>
<li class="bbp-forum-freshness">板块</li>
</ul>
</li>
</ul>
</div>
<?php
foreach ($forumidc as  $i) {
	echo get_list($i);
}
?>
<div class="category-forum">
<ul>
<li class="bbp-header">
<ul class="forum-titles">
<li class="bbp-forum-info"><?php echo $forumane4; ?></li>
<li class="bbp-forum-topic-reply-count">文章</li>
<li class="bbp-forum-freshness">板块</li>
</ul>
</li>
</ul>
</div>
<?php
foreach ($forumidd as  $i) {
	echo get_list($i);
}

?>
<div class="category-forum">
<ul>
<li class="bbp-header">
<ul class="forum-titles">
<li class="bbp-forum-info"><?php echo $forumane5; ?></li>
<li class="bbp-forum-topic-reply-count">文章</li>
<li class="bbp-forum-freshness">板块</li>
</ul>
</li>
</ul>
</div>
<?php
foreach ($forumide as  $i) {
	echo get_list($i);
}
?>
</ul> 
</li>
</ul>
</div>
</div>
</article>
<?php }else{ ?>
<article id="post-26" class="post-26 forum type-forum status-publish  single-content">
<h1 class="post-title page-heading" itemprop="headline"><span class="h-title"><?php echo $sortName;?></span></h1><div class="the-content post-content clearfix" propname="articleBody"><div id="bbpress-forums">
<div class="the-content"><p class="forum-description"><?php 
     $ery = mysql_query("SELECT * FROM ".DB_PREFIX."sort WHERE sid ='$sortid'"); $rest = mysql_fetch_array($ery);
	{
   echo ''.$rest['description'].''; 
}
    ?>
</p></div>
<ul id="bbp-forum-26" class="bbp-topics">
<li class="bbp-body">
<div class="category-forum">
<ul>
<li class="bbp-header">
<ul class="forum-titles">
<li class="bbp-topic-freshness">作者</li>
<li class="bbp-topic-title">主题</li>
<li class="bbp-topic-reply-posts-count">浏览 / 回复</li>
</ul>
</li>
</ul>
</div>
<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>
<ul id="bbp-topic-49" class="odd bbp-parent-forum-28 user-id-4 post-49 topic type-topic status-publish hentry">
<li class="bbp-topic-freshness">
<p class="bbp-topic-meta bbp-topic-avatars-meta">
<span class="bbp-topic-author">
<?php 
    global $CACHE;
	$user_cache = $CACHE->readCache('user');
 if(!empty($user_cache[$value['author']]['photo']['src'])): ?>
 <img alt="" src="<?php echo BLOG_URL.$user_cache[$value['author']]['photo']['src']; ?>" width="60" height="60" class="avatar avatar-60 wp-user-avatar wp-user-avatar-60 alignnone photo" />
 <?php else:?>
 <img alt="" src="<?php echo TEMPLATE_URL; ?>img/user.jpg" width="60" height="60" class="avatar avatar-60 wp-user-avatar wp-user-avatar-60 alignnone photo" />
<?php endif;?>
</span>
<span class="bbp-topic-freshness-author"><?php log_comments($value['logid']); ?></span>
</p>
</li>
<li class="bbp-topic-title">
<span class="bbp-topic-title"><a class="bbp-topic-permalink" href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></span>
<p class="bbp-topic-meta">
<span class="bbp-topic-started-by">作者：<?php blog_author($value['author']); ?></span>
<span class="last-post">
最后回复：<?php log_comment($value['logid']); ?><?php if(!$value['comnum']):?>暂无评论，快抢沙发！<?php endif;?>
</span>
</p>
</li>
<li class="bbp-topic-reply-posts-count topic-row">
<span class="count"><?php echo $value['views']; ?></span> 次浏览<br>
<span class="count"><?php echo $value['comnum']; ?></span> 条回复</li>
</ul>
<?php 
endforeach;
else:
?>
<div id="weizhaodao">
<div id="wzd_img1" class="animated bounceInDown">
<a href="<?php echo BLOG_URL; ?>" title="没数据">
<div class="nodata">暂无数据,点我返回首页</div>
</a>
</div>
</div>
<?php endif;?>
</div>
</div>
<div class="pagination">
<?php echo $page_url;?>
</div>
</article>
<?php };?>
</div>
<?php
include View::getView('side');
?>
</main>