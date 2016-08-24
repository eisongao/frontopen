<?php 
/**
 * 站点博客模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<main id="content" class="content-container container" role="main">
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
<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>
<article class="post-158 type-post status-publish format-standard has-post-thumbnail bottom-line blog-block main-term-12" >
<div class="row">
<?php if ($thm == "1"){?> 
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
 <?php $thum_src = getThumbnail($value['logid']);$imgFileArray = glob("content/templates/frontopen3/img/rand/*.*");$imgsrc = preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $value['content'], $img);$imgsrc = !empty($img[1]) ? $img[1][0] : ''; $imgNum = count($img[1]);?> 
<a class="post-thumbnail image-link" itemprop="thumbnailUrl" href="<?php echo $value['log_url']; ?>">
<?php if ($thum_src):?> 
<img src="<?php echo $thum_src; ?>"width="360" height="200" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image thumb"/>  
<?php elseif($imgsrc): ?>
<img src="<?php echo $imgsrc; ?>" width="360" height="200" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image thumb"/>  
<?php else: ?>
<img src="<?php echo BLOG_URL; ?><?php echo $imgFileArray[array_rand($imgFileArray)]; ?>" width="360" height="200" class="img-responsive wp-post-image thumb" >  
<?php endif; ?></a>
<span class="term-title term-12"><?php blog_sort($value['logid']); ?></span> </div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
<?php }else{?> 
<div class="col-lg-19 col-md-19 col-sm-12 col-xs-12">
<?php };?>
<?php topflg($value['top'], $value['sortop'], isset($sortid)?$sortid:''); ?>
<h2 class="title">
<a class="post-url"  rel="bookmark" href="<?php echo $value['log_url']; ?>">
<span class="post-title" itemprop="headline"><?php echo $value['log_title']; ?></span>
</a>
</h2>
<div class="post-meta meta ">
<span class="time"><i class="fa fa-clock-o"></i> 
<time class="post-published updated" datetime="<?php echo gmdate('Y-n-j', $value['date']); ?>" title="<?php echo gmdate('Y-n-j', $value['date']); ?>"><?php echo gmdate('Y-n-j', $value['date']); ?></time>
</span>
<span class="views" itemprop="interactionCount"><i class="fa fa-eye"></i><?php echo $value['views']; ?></span>
<a href="<?php echo $value['log_url']; ?>#comments"  class="comments" ><i class="fa fa-comments-o"></i><?php echo $value['comnum']; ?></a> 
<span class="post-author author">
<?php blog_author($value['author']); ?>
</span>
</div>
<div class="post-summary summary the-content" itemprop="about">
<p><?php echo handlearticledes($value['log_description']); ?></p>
</div>
</div>
</article>
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
<div class="pagination">
<?php echo $page_url;?>
</div>
<?php if ($fo2_ad_4 == "1"): ?> 
<div class="bf-shortcode bf-advertisement-code">
<?php echo $fo3_ad2; ?>
</div>
<?php endif;?>
</div>
<?php if ($sidebar == "1"): ?>
<?php
 include View::getView('side');
?>
<?php elseif ($sidebar == "2"): ?> 
<?php endif; ?> 
</main>