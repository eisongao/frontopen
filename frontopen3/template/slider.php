<?php 
/*
* 首页
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php if(blog_tool_ishome()){ ?>
<?php if ($silder == "1"): ?> 
<?php elseif ($silder == "2"): ?>
<?php if ($layout == "0"): ?>
<section class="main-slider-wrapper">
<div class="container">
<div class="row slider-style-6">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="main-slider slider-arrows">
<div class="flexslider">
<ul class="slides">
<li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
<article class="post-1 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-1" >
<a class="post-thumbnail image-link" href="<?php echo $sildurl1;?>">
<img width="1140" height="350" src="<?php echo $sildimg1;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl1;?>"><?php echo $sildcustom1;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl2;?>">
<img width="1140" height="350" src="<?php echo $sildimg2;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl2;?>"><?php echo $sildcustom2;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl3;?>">
<img width="1140" height="350" src="<?php echo $sildimg3;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl3;?>"><?php echo $sildcustom3;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl4;?>">
<img width="1140" height="350" src="<?php echo $sildimg4;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl4;?>"><?php echo $sildcustom4;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl5;?>">
<img width="1140" height="350" src="<?php echo $sildimg5;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl5;?>"><?php echo $sildcustom5;?></a></span>
</article>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</section>
<?php elseif ($layout == "1"): ?> 
<section class="main-slider-wrapper">
<?php if ($sortout == "1"): ?> 
<div class="container">
<div class="row slider-style-7">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slider-part-1">
<div class="large">
<div class="main-slider slider-arrows">
<div class="flexslider">
<ul class="slides">
<?php elseif($sortout =="2"):?>
<div class="container">
<div class="row slider-style-6">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="main-slider slider-arrows">
<div class="flexslider">
<ul class="slides">
<?php endif;?>
<li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
<article class="post-1 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-1" >
<a class="post-thumbnail image-link" href="<?php echo $sildurl1;?>">
<img width="1140" height="350" src="<?php echo $sildimg1;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl1;?>"><?php echo $sildcustom1;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildur2;?>">
<img width="1140" height="350" src="<?php echo $sildimg2;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo  $sildurl2;?>"><?php echo $sildcustom2;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl3;?>">
<img width="1140" height="350" src="<?php echo $sildimg3;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif"  class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl4;?>"><?php echo $sildcustom3;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl4;?>">
<img width="1140" height="350" src="<?php echo $sildimg4;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl4;?>"><?php echo $sildcustom4;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl5;?>">
<img width="1140" height="350" src="<?php echo $sildimg5;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl5;?>"><?php echo $sildcustom5;?></a></span>
</article>
</li>
</ul>
</div>
</div>
</div>
</div>
<?php if ($sortout == "1"): ?> 
</div>
<div class="row hidden-xs">
<?php
//栏目列表
function get_list($sort){
        $db = MySql::getInstance();
        $sql = "SELECT gid,title,date,content FROM ".DB_PREFIX."blog WHERE sortid=".$sort." AND hide='n' ORDER BY `date` DESC LIMIT 0,1";
        global $CACHE;
		$sort_cache = $CACHE->readCache('sort');
        $first = $db->query($sql);
                while($row = $db->fetch_array($first)){
$thum_src = getThumbnail($row['gid']);
if (empty($thum_src)) {
$rand_num = 0; 
if ($rand_num == 0) {
$thum_src = TEMPLATE_URL."img/rand/0.jpg";
}else{
$thum_src = TEMPLATE_URL."img/rand/".rand(1,$rand_num).".jpg"; } 
}
$f = '
<div class="col-lg-4 col-md-4 col-sm-6">
<article class="post-175 type-post status-publish format-video has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link" itemprop="thumbnailUrl" href="'.Url::log($row['gid']).'">
<img width="360" height="165" src="'.$thum_src.'" data-original="'.TEMPLATE_URL.'img/loading.gif" class="img-responsive wp-post-image" alt="photodune-4688491-growth-m"> </a>
<span class="term-title term-12"><a href="'.Url::sort($sort).'">' . $sort_cache[$sort]['sortname'] . '</a></span> <div class="content">
<h2 class="title"><a class="post-url" rel="bookmark" href="'.Url::log($row['gid']).'" title="'.$row['title'].'"><span class="post-title" >'.$row['title'].'</span></a></h2>
</div>
</article>
</div>
';
echo $f;
}
}?>
<?php
foreach ($sort_id as  $i) {
	echo get_list($i);
}
?>
</div> 
<?php elseif($sortout == "2"): ?> 
<?php endif;?>
</div>
</section>
<?php elseif ($layout == "2"): ?>
<section class="main-slider-wrapper">
<div class="container">
<div class="row slider-style-6">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="main-slider slider-arrows">
<div class="flexslider">
<ul class="slides">
<li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
<article class="post-1 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-1" >
<a class="post-thumbnail image-link" href="<?php echo $sildurl1;?>">
<img width="1140" height="350" src="<?php echo $sildimg1;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl1;?>"><?php echo $sildcustom1;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl2;?>">
<img width="1140" height="350" src="<?php echo $sildimg2;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl2;?>"><?php echo $sildcustom2;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl3;?>">
<img width="1140" height="350" src="<?php echo $sildimg3;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl3;?>"><?php echo $sildcustom3;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl4;?>">
<img width="1140" height="350" src="<?php echo $sildimg4;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl4;?>"><?php echo $sildcustom4;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl5;?>">
<img width="1140" height="350" src="<?php echo $sildimg5;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl5;?>"><?php echo $sildcustom5;?></a></span>
</article>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</section>
<?php elseif ($layout == "3"): ?>
<?php if ($bbsout == "1"): ?>
<section class="main-slider-wrapper">
<div class="container">
<div class="row slider-style-6">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="main-slider slider-arrows">
<div class="kk_xshow">
  <table cellspacing="0" cellpadding="0" width="100%" align="center">
     <tbody><tr class="header">
      <td class="border"><h3>博客图片</h3></td>
      <td class="border"><h3>最新日记</h3></td>
      <td class="border"><h3>最新回复</h3></td>
      <td class="border"><h3>热门日记</h3></td>
    </tr>
    <tr class="txt_con">
<td width="25%" class="border">
    <embed src="<?php echo TEMPLATE_URL; ?>img/new_img.swf?bcastr_xml_url=<?php echo TEMPLATE_URL; ?>img/img_xml.php" width="250" height="200" loop="false" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" salign="T" name="scriptmain" menu="false" wmode="transparent"></embed>
</td>
      <td width="25%" class="border">
        <table cellpadding="0" cellspacing="0" class="txt">
          <tbody><tr>
  <td><div style="height:200px;overflow:hidden;"><img src="<?php echo TEMPLATE_URL; ?>img/list.gif" alt=""></div></td>
            <td width="100%">            
     <?php 
	 global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog'); ?>
		<?php foreach($newLogs_cache as $value): ?>
		<div><a href="<?php echo Url::log($value['gid']); ?>" title="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></a></div>
		<?php endforeach; ?>
            </td>
          </tr>
        </tbody></table>
      </td>
      <td width="25%" class="border">
        <table cellpadding="0" cellspacing="0" class="txt">
          <tbody><tr>
  <td><div style="height:200px;overflow:hidden;"><img src="<?php echo TEMPLATE_URL; ?>img/list.gif" alt=""></div></td>
            <td width="100%"> 
			<?php global $CACHE;
	$com_cache = $CACHE->readCache('comment');
	$com_cache = array_slice($com_cache,0,10);shuffle($com_cache);
	?>
			<?php 
	foreach($com_cache as $value): 
	$url = Url::log($value['gid']).'#'.$value['cid'];
	?>
	<div id="newsreply">
   <a href="<?php echo $url; ?>" title="<?php
 include View::getView('list');
?>"><?php echo  preg_replace("#\|smile:(\d+)\|#i",'<img src="'.BLOG_URL.'content/plugins/face/face/$1.gif"  />',$value['content']); ?></a></div>
	<?php endforeach; ?>         
            </td>
          </tr>
        </tbody></table>
      </td>
      <td width="25%" class="border">
        <table cellpadding="0" cellspacing="0" class="txt">
          <tbody><tr>
  <td><div style="height:200px;overflow:hidden;"><img src="<?php echo TEMPLATE_URL; ?>img/list.gif" alt=""></div></td>
            <td width="100%">
			<?php 
        $Log_Model = new Log_Model();
		$hotlogs = $Log_Model->getLogsForHome("ORDER BY comnum DESC,date DESC", 1, 10);?>
		<?php foreach($hotlogs as $value): ?>
     <div>  <a href="<?php echo Url::log($value['gid']); ?>" title="<?php echo $value['log_title']; ?>"><?php echo subString($value['log_title'],0,37);?></a></div>
		<?php endforeach; ?>
            </td>
          </tr>
        </tbody></table>
      </td>
    </tr>
    <tr></tr></tbody></table>
</div>
</div>
</div> </div>
</section>
<?php elseif ($bbsout == "2"): ?> 
 <section class="main-slider-wrapper">
<div class="container">
<div class="row slider-style-6">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="main-slider slider-arrows">
<div class="flexslider">
<ul class="slides">
<li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
<article class="post-1 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-1" >
<a class="post-thumbnail image-link" href="<?php echo $sildurl1;?>">
<img width="1140" height="350" src="<?php echo $sildimg1;?>" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl1;?>"><?php echo $sildcustom1;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildur2;?>">
<img width="1140" height="350" src="<?php echo $sildimg2;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo  $sildurl2;?>"><?php echo $sildcustom2;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl3;?>">
<img width="1140" height="350" src="<?php echo $sildimg3;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl4;?>"><?php echo $sildcustom3;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl4;?>">
<img width="1140" height="350" src="<?php echo $sildimg4;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl4;?>"><?php echo $sildcustom4;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl5;?>">
<img width="1140" height="350" src="<?php echo $sildimg5;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl5;?>"><?php echo $sildcustom5;?></a></span>
</article>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</section>
<?php elseif ($bbsout == "3"): ?> 
<?php endif;?>
<?php elseif ($layout == "4"): ?> 
<section class="main-slider-wrapper">
<?php if ($sortout == "1"): ?> 
<div class="container">
<div class="row slider-style-7">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slider-part-1">
<div class="large">
<div class="main-slider slider-arrows">
<div class="flexslider">
<ul class="slides">
<?php elseif($sortout =="2"):?>
<div class="container">
<div class="row slider-style-6">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="main-slider slider-arrows">
<div class="flexslider">
<ul class="slides">
<?php endif;?>
<li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
<article class="post-1 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-1" >
<a class="post-thumbnail image-link" href="<?php echo $sildurl1;?>">
<img width="1140" height="350" src="<?php echo $sildimg1;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl1;?>"><?php echo $sildcustom1;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildur2;?>">
<img width="1140" height="350" src="<?php echo $sildimg2;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo  $sildurl2;?>"><?php echo $sildcustom2;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl3;?>">
<img width="1140" height="350" src="<?php echo $sildimg3;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl4;?>"><?php echo $sildcustom3;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl4;?>">
<img width="1140" height="350" src="<?php echo $sildimg4;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl4;?>"><?php echo $sildcustom4;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl5;?>">
<img width="1140" height="350" src="<?php echo $sildimg5;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl5;?>"><?php echo $sildcustom5;?></a></span>
</article>
</li>
</ul>
</div>
</div>
</div>
</div>
<?php if ($sortout == "1"): ?> 
</div>
<div class="row hidden-xs">
<?php
//栏目列表
function get_list($sort){
        $db = MySql::getInstance();
        $sql = "SELECT gid,title,date,content FROM ".DB_PREFIX."blog WHERE sortid=".$sort." AND hide='n' ORDER BY `date` DESC LIMIT 0,1";
        global $CACHE;
		$sort_cache = $CACHE->readCache('sort');
        $first = $db->query($sql);
                while($row = $db->fetch_array($first)){
$thum_src = getThumbnail($row['gid']);
if (empty($thum_src)) {
$rand_num = 0; 
if ($rand_num == 0) {
$thum_src = TEMPLATE_URL."img/rand/0.jpg";
}else{
$thum_src = TEMPLATE_URL."img/rand/".rand(1,$rand_num).".jpg"; } 
}
                        $f = '
						<div class="col-lg-4 col-md-4 col-sm-6">
						<article class="post-175 type-post status-publish format-video has-post-thumbnail  block-highlight main-term-12" >
						<a class="post-thumbnail image-link" itemprop="thumbnailUrl" href="'.Url::log($row['gid']).'">
<img width="360" height="165" src="'.$thum_src.'" class="img-responsive wp-post-image" alt="photodune-4688491-growth-m"> </a>
<span class="term-title term-12"><a href="'.Url::sort($sort).'">' . $sort_cache[$sort]['sortname'] . '</a></span> <div class="content">
<h2 class="title"><a class="post-url" rel="bookmark" href="'.Url::log($row['gid']).'" title="'.$row['title'].'"><span class="post-title" >'.$row['title'].'</span></a></h2>
</div>
</article>
</div>
';
echo $f;
}
}?>
<?php
foreach ($sort_id as  $i) {
	echo get_list($i);
}
?>
</div> 
<?php elseif($sortout == "2"): ?> 
<?php endif;?>
</div>
</section>
<?php elseif ($layout == "5"): ?> 
<section class="main-slider-wrapper">
<?php if ($sortout == "1"): ?> 
<div class="container">
<div class="row slider-style-7">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slider-part-1">
<div class="large">
<div class="main-slider slider-arrows">
<div class="flexslider">
<ul class="slides">
<?php elseif($sortout =="2"):?>
<div class="container">
<div class="row slider-style-6">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="main-slider slider-arrows">
<div class="flexslider">
<ul class="slides">
<?php endif;?>
<li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
<article class="post-1 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-1" >
<a class="post-thumbnail image-link" href="<?php echo $sildurl1;?>">
<img width="1140" height="350" src="<?php echo $sildimg1;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl1;?>"><?php echo $sildcustom1;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildur2;?>">
<img width="1140" height="350" src="<?php echo $sildimg2;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo  $sildurl2;?>"><?php echo $sildcustom2;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl3;?>">
<img width="1140" height="350" src="<?php echo $sildimg3;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl4;?>"><?php echo $sildcustom3;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl4;?>">
<img width="1140" height="350" src="<?php echo $sildimg4;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl4;?>"><?php echo $sildcustom4;?></a></span>
</article>
</li>
<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
<article class="post-169 type-post status-publish format-standard has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo $sildurl5;?>">
<img width="1140" height="350" src="<?php echo $sildimg5;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif" class="img-responsive wp-post-image" draggable="false"> </a>
<span class="term-title term-12"><a href="<?php echo $sildurl5;?>"><?php echo $sildcustom5;?></a></span>
</article>
</li>
</ul>
</div>
</div>
</div>
</div>
<?php if ($sortout == "1"): ?> 
</div>
<div class="row hidden-xs">
<?php
//栏目列表
function get_list($sort){
        $db = MySql::getInstance();
        $sql = "SELECT gid,title,date,content FROM ".DB_PREFIX."blog WHERE sortid=".$sort." AND hide='n' ORDER BY `date` DESC LIMIT 0,1";
        global $CACHE;
		$sort_cache = $CACHE->readCache('sort');
        $first = $db->query($sql);
                while($row = $db->fetch_array($first)){
$thum_src = getThumbnail($row['gid']);
if (empty($thum_src)) {
$rand_num = 0; 
if ($rand_num == 0) {
$thum_src = TEMPLATE_URL."img/rand/0.jpg";
}else{
$thum_src = TEMPLATE_URL."img/rand/".rand(1,$rand_num).".jpg"; } 
}
 $f = '<div class="col-lg-4 col-md-4 col-sm-6">
<article class="post-175 type-post status-publish format-video has-post-thumbnail  block-highlight main-term-12" >
<a class="post-thumbnail image-link" itemprop="thumbnailUrl" href="'.Url::log($row['gid']).'">
<img width="360" height="165" src="'.$thum_src.'" class="img-responsive wp-post-image" alt="photodune-4688491-growth-m"> </a>
<span class="term-title term-12"><a href="'.Url::sort($sort).'">' . $sort_cache[$sort]['sortname'] . '</a></span> <div class="content">
<h2 class="title"><a class="post-url" rel="bookmark" href="'.Url::log($row['gid']).'" title="'.$row['title'].'"><span class="post-title" >'.$row['title'].'</span></a></h2>
</div>
</article>
</div>
';
 echo $f;
}
}?>
<?php
foreach ($sort_id as  $i) {
	echo get_list($i);
}
?>
</div> 
<?php elseif($sortout == "2"): ?> 
<?php endif;?>
</div>
</section>
<?php endif;?>
<?php elseif ($silder == "3"): ?>
<?php endif;?>
<?php }else{ ?>
<?php };?>