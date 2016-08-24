<?php 
/**
 * 站点公司模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php if (blog_tool_ishome()): ?>
<main id="content" class="content-container container" role="main">
<div class="row main-section">
<div class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12  content-column" >
<div class="about_box">
<h4 class="section-heading">
<span class="h-title"><?php echo $cusname; ?></span>
</h4>
<section>
<img align="left" src="<?php echo TEMPLATE_URL; ?>img/about.png">
<p class="about_contents">
<?php echo $about; ?>
</p>  
<section>
</div>
</div>
<div class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12  content-column" >
<div class="index_product">
<h4 class="section-heading">
<span class="h-title"><?php echo $cusnames; ?></span>
</h4>
</div>                
<div class="product_list">
<?php
//获取含图片的最新文章
function sheli_img(){
$db = MySql::getInstance();
$sql = "SELECT blogid as g,filepath,(SELECT title FROM ".DB_PREFIX."blog where `gid`=g) as t FROM ".DB_PREFIX."attachment WHERE `filepath` LIKE '%jpg' OR `filepath` LIKE '%gif' OR `filepath` LIKE '%png' GROUP BY `blogid` ORDER BY `addtime` DESC LIMIT 0, 8";
$imgs = $db->query($sql);
while($row = $db->fetch_array($imgs)){
$img .= '<div class="col-lg-3 col-md-3 col-sm-12"><article class="post-175 type-post status-publish format-video has-post-thumbnail  block-highlight main-term-8" ><a href="'.Url::log($row['g']).'" title="'.$row['t'].'" class="post-thumbnail image-link"><img src="'.BLOG_URL.substr($row['filepath'],3,strlen($row['filepath'])).'" alt="'.$row['t'].'" width="360" height="200" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image thumb"/><div class="content"><h2 class="title"><a class="post-url" itemprop="url" rel="bookmark" href="'.Url::log($row['g']).'"><span class="post-title">'.$row['t'].'</span></a></h2></div></article></div>';}
echo $img;}
sheli_img();
?>
</div>
</div>
<div class="col-xs-12 col-sm-8 col-md-7">
<div class="news_box">
<h4 class="section-heading">
<span class="h-title">新闻中心</span>
</h4>
<ul class="index_news">
<?php echo get_newtwLI(4); ?>
</ul>
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-5">    
<div class="index_contact">
 <h4 class="section-heading">
    <span class="h-title">联系我们</span>
</h4>
<p style="padding-top:20px;">联系人：<?php echo $contact; ?></p>
<p>手 机：<?php echo $iphone; ?></p>
<p>电 话：<?php echo $phone; ?></p>
<p>邮 箱：<?php echo $cmail; ?></p>
<p>地 址：<?php echo $address; ?></p>
</div>
<div class="btn-group dropup" style="margin-bottom:15px;">
<button type="button" class="btn btn-default btn-sm" data-toggle="dropdown" aria-expanded="false" style="line-height:13px;height:30px">---友情链接---</button>
<button type="button" class="btn btn-default dropdown-toggle btn-sm" style="line-height:13px;height:30px">
<span class="caret"></span>
<span class="sr-only">友情链接</span>
</button>
<ul class="dropdown-menu" role="menu">
<?php global $CACHE; 
	$link_cache = $CACHE->readCache('link');
	?>
<?php foreach($link_cache as $value): ?>
<li><a href="<?php echo TEMPLATE_URL; ?>template/go.php?url=<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
<?php endforeach; ?>
</ul>
</div>
</div>            
</main>
<?php else:?>
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
<?php if($value['top']=='n'):?>
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
<img src="<?php echo BLOG_URL; ?><?php echo $imgFileArray[array_rand($imgFileArray)]; ?>" width="360" height="200" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image thumb" >  
<?php endif; ?></a>
<span class="term-title term-12"><?php blog_sort($value['logid']); ?></span> </div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
<?php }else{?> 
<div class="col-lg-19 col-md-19 col-sm-12 col-xs-12">
<?php };?>
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
<?php endif; ?> 
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
</div>
<?php if ($sidebar == "1"): ?>
<?php
 include View::getView('side');
?>
<?php elseif ($sidebar == "2"): ?> 
<?php endif; ?> 
</main>
<?php endif; ?> 