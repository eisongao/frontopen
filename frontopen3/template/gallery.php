<?php 
/**
 * 站点图片模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php if ($waterfall == "1"){?>
<div id="container">
<div id="content">
<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>
<?php
$thum_src = getThumbnail($value['logid']);
if (empty($thum_src)) {
$rand_num = 0; 
if ($rand_num == 0) {
$thum_src = TEMPLATE_URL."img/rand/0.jpg";
}else{
$thum_src = TEMPLATE_URL."img/rand/".rand(1,$rand_num).".jpg"; } 
}?>
<div class="box">
<div class="clear"></div>
<div class="img"><a href="<?php echo $value['log_url']; ?>"><img src="<?php echo $thum_src; ?>" /></a>
<span class="term-title term-12"><?php blog_sort($value['logid']); ?></span>
</div>
<div class="logtitle">
<a href="<?php echo $value['log_url']; ?>"><?php echo subString(strip_tags($value['title']),0,12); ?><?//php echo $value['log_title']; ?></a>
</div>
<div class="logtext">                           
<!--p--><?php echo ''.subString(strip_tags($value['log_description'],$img),0,60).'  .....'; ?><!--/p-->
<!--<p><?php blog_sort($value['logid']); ?>><?php blog_tag($value['logid']); ?></p>-->
</div>
</div>
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
<main id="content" class="content-container container">
<div id="loading"></div> 
<div class="pagination" id="pageurl">
<?php echo $page_url;?>
</div>
</main>
</div>
<?php }else{?>
<main id="content" class="content-container container">
<div class="row main-section">
<?php if ($sidebar == "1"): ?>
<div class="main-content col-lg-8 col-md-8 col-sm-8 col-xs-12 with-sidebar content-column" >
<?php elseif ($sidebar == "2"): ?> 
<div class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12  content-column" >
<?php endif; ?> 
<h1 class="page-heading">
<span class="h-title">最新文章</span>
<a class="rss-link" href="<?php echo BLOG_URL; ?>rss.php"><i class="fa fa-rss"></i>
</a>
</h1>
<div class="row">
<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>
<?php
$thum_src = getThumbnail($value['logid']);
if (empty($thum_src)) {
$rand_num = 0; 
if ($rand_num == 0) {
$thum_src = TEMPLATE_URL."img/rand/0.jpg";
}else{
$thum_src = TEMPLATE_URL."img/rand/".rand(1,$rand_num).".jpg"; } 
}?>
<?php if ($sidebar == "1"): ?>
<div class="col-lg-6 col-md-6 col-sm-12">
<?php elseif ($sidebar == "2"): ?> 
<div class="col-lg-3 col-md-3 col-sm-12">
<?php endif; ?>
<article class="post-175 type-post status-publish format-video has-post-thumbnail  block-highlight main-term-8" >
<a class="post-thumbnail image-link" itemprop="thumbnailUrl" href="<?php echo $value['log_url']; ?>">
<img width="360" height="200" src="<?php echo $thum_src; ?>" class="img-responsive wp-post-image">
</a>
<span class="term-title term-8">
<?php blog_sort($value['logid']); ?>
</span>
<div class="content">
<h2 class="title">
<a class="post-url" itemprop="url" rel="bookmark" href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>">
<span class="post-title"><?php echo $value['log_title']; ?></span></a></h2>
<div class="post-meta meta ">
<span class="time"><i class="fa fa-clock-o"></i> 
<time class="post-published updated" datetime="<?php echo gmdate('Y-n-j', $value['date']); ?>">
<?php echo gmdate('Y-n-j', $value['date']); ?></time></span>
<span class="views" itemprop="interactionCount"><i class="fa fa-eye"></i><?php echo $value['views']; ?></span><a href="<?php echo $value['log_url']; ?>#comments" class="comments"><i class="fa fa-comment"></i> <?php echo $value['comnum']; ?></a>
</div>
</article>
</div>
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
<div class="pagination">
<?php echo $page_url;?>
</div>
</div>
<?php if ($sidebar == "1"): ?>
<?php
 include View::getView('side');
?>
<?php elseif ($sidebar == "2"): ?> 
<?php endif; ?> 
</main>
<?php }?>