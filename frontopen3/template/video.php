<?php 
/**
 * 站点博客模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php if ($caiji == "1"){ ?>
<?php }else{ ?>
<?php if (blog_tool_ishome()): ?>
<main id="content" class="content-container container" role="main">
<div class="row main-section">
<div class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12  content-column" >
<?php if ($tabtools == "1"): ?>
<div class="row tab-content-listing block-listing">
<div class="col-lg-12">
<div class="section-heading extended tab-heading  clearfix term-12">
<ul class="other-links nav nav-tabs">
<?php if (is_mobile() ): ?>
<li class="other-item main-term term-12 active">
<a href="#12" data-toggle="tab" aria-expanded="true">站长推荐</a>
</li>
<?php else:?>
<li class="other-item main-term term-12 active">
<a href="#12" data-toggle="tab" aria-expanded="true">站长推荐</a>
</li>
<li class="other-item  term-9">
<a href="#tabhot" data-toggle="tab" aria-expanded="false">热门影视</a></li>
<li class="other-item  term-14"><a href="#tabrand" data-toggle="tab" aria-expanded="false">随机影视</a></li>
<li class="other-item  term-8"><a href="#tabnew" data-toggle="tab" aria-expanded="false">最新影视</a></li>
<?php endif ;?>
</ul>
</div> 
<div class="tab-content">
<div class="tab-pane active" id="12">
<div class="row block-listing block-listing-3">
<?php if (is_mobile() ): ?>
<?php else:?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<?php echo $tab_ad; ?>
</div>
<?php endif ;?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-left-line"> <ol class="listing-thumbnail">
<?php video_Top_Logs() ?>
</ol>
</div>
</div>
</div>
<div class="tab-pane" id="tabhot">
<div class="row block-listing block-listing-3">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<?php echo $tab_ad; ?>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-left-line"> 
<ol class="listing-thumbnail">
<?php
$index_hotlognum = Option::get('index_hotlognum');
$db = MySql::getInstance();
$sql = $db->query ("SELECT * FROM ".DB_PREFIX."blog WHERE hide='n' and checked='y' and type='blog' ORDER BY views DESC, comnum DESC LIMIT 0, 4");
?>
<?php
while($row = $db->fetch_array($sql)){
$search_pattern = '%<img[^>]*?src=[\'\"]((?:(?!\/admin\/|>).)+?)[\'\"][^>]*?>%s';
preg_match($search_pattern, $row['content'],$match);
$img_src = getThumbnail($row['gid']);
$imgsrc = !empty($match[1]) ? $match[1][0] : '';
if($img_src){ 
$thum_src= $img_src;
}elseif($imgsrc){ 
$thum_src =$imgsrc;
}else{
$thum_src = isset($match[0][0]) ? $match[0][0] : ''.TEMPLATE_URL.'img/rand/'.rand(1,4).'.jpg';
}
$comment = ($row['comnum'] != 0) ? '评论('.$row['comnum'].')' : '评论(0)';
?>
<li class="post-172 type-post status-publish format-standard has-post-thumbnail  clearfix main-term-12">
<a class="post-thumbnail"  href="<?php echo Url::log($row['gid']); ?>">
<img width="90" height="60" src="<?php echo $thum_src; ?>" class="attachment-post-thumbnail wp-post-image" >
</a>
<h3 class="title">
<a class="post-url" rel="bookmark" href="<?php echo Url::log($row['gid']); ?>" title="<?php echo $row['title']; ?>">
<span class="post-title" ><?php echo $row['title']; ?></span>
</a>
</h3>
<div class="post-meta meta ">
<span class="time"><i class="fa fa-clock-o"></i> <time class="post-published updated">
<?php echo gmdate('Y-n-j', $row['date']); ?></time>
</span>
<span class="views" itemprop="interactionCount"><i class="fa fa-eye"></i><?php echo $row['views']; ?></span>
</div>
</li>
<?php } ?>
</ol>
</div>
</div>
</div>
<div class="tab-pane" id="tabrand"> 
<div class="row block-listing block-listing-3">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<?php echo $tab_ad; ?>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-left-line"> 
<ol class="listing-thumbnail">
<?php
global $CACHE;
$index_randlognum = Option::get('index_randlognum');
$sta_cache = $CACHE->readCache('sta');
$lognum = $sta_cache['lognum'];
$start = $lognum > $index_randlognum ? mt_rand(0, $lognum - $index_randlognum): 0;
$db = MySql::getInstance();
$sql = $db->query ("SELECT * FROM ".DB_PREFIX."blog WHERE hide='n' and checked='y' and type='blog' LIMIT $start, 4");
?>
<?php
while($row = $db->fetch_array($sql)){
$search_pattern = '%<img[^>]*?src=[\'\"]((?:(?!\/admin\/|>).)+?)[\'\"][^>]*?>%s';
preg_match($search_pattern, $row['content'],$match);
$img_src = getThumbnail($row['gid']);
$imgsrc = !empty($match[1]) ? $match[1][0] : '';
if($img_src){ 
$thum_src= $img_src;
}elseif($imgsrc){ 
$thum_src =$imgsrc;
}else{
$thum_src = isset($match[0][0]) ? $match[0][0] : ''.TEMPLATE_URL.'img/rand/'.rand(1,4).'.jpg';
}
$comment = ($row['comnum'] != 0) ? '评论('.$row['comnum'].')' : '评论(0)';
?>
<li class="post-172 type-post status-publish format-standard has-post-thumbnail  clearfix main-term-12">
<a class="post-thumbnail"  href="<?php echo Url::log($row['gid']); ?>">
<img width="90" height="60" src="<?php echo $thum_src; ?>" class="attachment-post-thumbnail wp-post-image" >
</a>
<h3 class="title">
<a class="post-url" rel="bookmark" href="<?php echo Url::log($row['gid']); ?>" title="<?php echo $row['title']; ?>">
<span class="post-title" ><?php echo $row['title']; ?></span>
</a>
</h3>
<div class="post-meta meta ">
<span class="time"><i class="fa fa-clock-o"></i> <time class="post-published updated">
<?php echo gmdate('Y-n-j', $row['date']); ?></time>
</span>
<span class="views" itemprop="interactionCount"><i class="fa fa-eye"></i><?php echo $row['views']; ?></span>
</div>
</li>
<?php } ?>
</ol>
</div>
</div>
</div>
<div class="tab-pane" id="tabnew"> 
<div class="row block-listing block-listing-3">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<?php echo $tab_ad; ?>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-left-line"> 
<ol class="listing-thumbnail">
<?php
$index_newlognum = Option::get('index_newlognum');
$db = MySql::getInstance();
$sql = $db->query ("SELECT * FROM ".DB_PREFIX."blog WHERE hide='n' AND type='blog' AND top='n' order by date DESC limit 0,4");
?>
<?php
while($row = $db->fetch_array($sql)){
$search_pattern = '%<img[^>]*?src=[\'\"]((?:(?!\/admin\/|>).)+?)[\'\"][^>]*?>%s';
preg_match($search_pattern, $row['content'],$match);
$img_src = getThumbnail($row['gid']);
$imgsrc = !empty($match[1]) ? $match[1][0] : '';
if($img_src){ 
$thum_src= $img_src;
}elseif($imgsrc){ 
$thum_src =$imgsrc;
}else{
$thum_src = isset($match[0][0]) ? $match[0][0] : ''.TEMPLATE_URL.'img/rand/'.rand(1,4).'.jpg';
}
$comment = ($row['comnum'] != 0) ? '评论('.$row['comnum'].')' : '评论(0)';
?>
<li class="post-172 type-post status-publish format-standard has-post-thumbnail  clearfix main-term-12">
<a class="post-thumbnail"  href="<?php echo Url::log($row['gid']); ?>">
<img width="90" height="60" src="<?php echo $thum_src; ?>" class="attachment-post-thumbnail wp-post-image" >
</a>
<h3 class="title">
<a class="post-url" rel="bookmark" href="<?php echo Url::log($row['gid']); ?>" title="<?php echo $row['title']; ?>">
<span class="post-title" ><?php echo $row['title']; ?></span>
</a>
</h3>
<div class="post-meta meta ">
<span class="time"><i class="fa fa-clock-o"></i> <time class="post-published updated">
<?php echo gmdate('Y-n-j', $row['date']); ?></time>
</span>
<span class="views" itemprop="interactionCount"><i class="fa fa-eye"></i><?php echo $row['views']; ?></span>
</div>
</li>
<?php } ?>
</ol>
</div>
</div>
</div>
</div>
</div>
</div>
<?php elseif ($tabtools== "2"): ?> 
<?php endif; ?> 
<?php
foreach ($video_id as  $i) {
echo get_video($i);
}
?>
</main>
<?php else:?>
<main id="content" class="content-container container">
<div class="row main-section">
<div class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12  content-column" >
<h1 class="page-heading">
<span class="h-title"><?php
if($params[1]=='sort'){
    if (isset($sort_cache[$sort_cache[$sortid]['pid']])){
        echo '<a href="'.Url::sort($sort_cache[$sortid]['pid']).'">'.$sort_cache[$sort_cache[$sortid]['pid']]['sortname'].'</a>&raquo';
    }
    echo ''.$sortName.'';
}elseif($params[1]=='tag'){
    echo '标签：'.htmlspecialchars(urldecode($params[2])).'';
}elseif($params[1]=='author'){
    global $CACHE;
    $user_cache = $CACHE->readCache('user');
    echo ''.$user_cache[$author]['name'].'的文章';
}elseif($params[1]=='keyword'){
    echo ''.htmlspecialchars(urldecode($params[2])).' 的搜索结果';
}elseif($params[1]=='record'){
    echo ''.substr($params[2],0,4).'年'.substr($params[2],4,2).'月的文章';
}elseif($params[1]=='page'){
    echo '最新发布 <small>第 '.htmlspecialchars(urldecode($params[2])).' 页</small>';
}?></span>
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
<div class="col-lg-3 col-md-3 col-sm-12">
<article class="post-175 type-post status-publish format-video has-post-thumbnail  block-highlight main-term-8" >
<a class="post-thumbnail image-link" itemprop="thumbnailUrl" href="<?php echo $value['log_url']; ?>">
<img width="360" height="200" src="<?php echo $thum_src; ?>" class="img-responsive wp-post-image">
<i class="fa fa-play-circle-o"></i>
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
</main>
<?php endif; ?> 
<?php } ?> 