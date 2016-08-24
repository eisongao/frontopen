<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php if ($picmod == "2"): ?>
<?php if($pageurl == Url::logPage()){?>
<div class="main">
<?php doAction('index_loglist_top'); ?>
<div class="top_box">
<?php if ($listgongg == "yes"): ?><div class="top_post"><div class="title">公 告</div><article class="ulist"><h2><a href="<?php echo BLOG_URL; ?>t"><i class="icon-eject icon-large"></i><?php echo index_t(1); ?></a></h2></article></div><?php else: ?><?php endif; ?>
<?php echo getTopLogs(_g('ggnum'))?></div>
<div class="page_box" >
	<?php if (!empty($logs)):foreach($logs as $value):?>
<dl class="post_pic_box">
	<dt><a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>" rel="bookmark">
	    <?php $thum_src = getThumbnail($value['logid']);$imgFileArray = glob("content/templates/frontopen2/images/random/*.*");$imgsrc = preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $value['content'], $img);$imgsrc = !empty($img[1]) ? $img[1][0] : ''; ?>
<?php if ($thum_src):?> 
<img src="<?php echo $thum_src; ?>" class="attachment-thumbnail wp-post-image" alt=""/>
<?php elseif($imgsrc): ?>
<img src="<?php echo $imgsrc; ?>" class="attachment-thumbnail wp-post-image" alt=""/>
<?php else: ?>
<img src="<?php echo BLOG_URL; ?><?php echo $imgFileArray[array_rand($imgFileArray)]; ?>" class="attachment-thumbnail wp-post-image" alt=""/>
<?php endif; ?>
        </a></dt>
    <dd class="info">分类: <?php blog_sort($value['logid']); ?><span class="time"><?php echo gmdate('Y-m-d', $value['date']); ?></span></dd>
    <dd><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></dd>
</dl>
    <?php endforeach;else:?>
	<h2>未找到</h2>
	<p>
		抱歉，没有符合您查询条件的结果。
	</p>
	<?php endif;?>
	<div class="cls">
	</div>
	<div class="page_num">
		<?php echo $page_url;?>
	</div>
	<div class="cls">
	</div>
</div>
</div>
<?php }else{?>
<div id="container"><div id="content" role="main"><?php if (!empty($logs)):?><h1 class="page-title">分类目录归档：<span><?php echo $sortName;?><?php echo $_GET['keyword'];?></span></h1><?php else:?><h1 class="page-title">你搜索的关键词：<span><?php echo $_GET['keyword'];?></span></h1><?php endif;?>
<div class="page_box">
	<?php if (!empty($logs)):foreach($logs as $value):?>
<dl class="post_pic_box">
	<dt><a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>" rel="bookmark">
	    <?php $thum_src = getThumbnail($value['logid']);$imgFileArray = glob("content/templates/frontopen2/images/random/*.*");$imgsrc = preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $value['content'], $img);$imgsrc = !empty($img[1]) ? $img[1][0] : ''; ?>
<?php if ($thum_src):?> 
<img src="<?php echo $thum_src; ?>" class="attachment-thumbnail wp-post-image" alt=""/>
<?php elseif($imgsrc): ?>
<img src="<?php echo $imgsrc; ?>" class="attachment-thumbnail wp-post-image" alt=""/>
<?php else: ?>
<img src="<?php echo BLOG_URL; ?><?php echo $imgFileArray[array_rand($imgFileArray)]; ?>" class="attachment-thumbnail wp-post-image" alt=""/>
<?php endif; ?>
        </a></dt>
    <dd class="info">分类: <?php blog_sort($value['logid']); ?><span class="time"><?php echo gmdate('Y-m-d', $value['date']); ?></span></dd>
    <dd><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></dd>
</dl>
    <?php endforeach;else:?>
	<h2>未找到</h2>
	<p>
		抱歉，没有符合您查询条件的结果。
	</p>
	<?php endif;?>
	<div class="cls">
	</div>
	<div class="page_num">
		<?php echo $page_url;?>
	</div>
	<div class="cls">
	</div>
</div>
</div>
</div>
<?php };?>
<?php elseif ($picmod == "1"): ?>
<?php if($pageurl == Url::logPage()){?>
<div class="main">
<?php if ($focus_img == "yes"): ?>
<div class="focus">
<div class="focus_img" >
<ul>
<?php indexLogList(3);?>
</ul>
</div>
<div class="bt_line"></div>
</div>
<?php else: ?>	
<?php endif; ?>
<?php doAction('index_loglist_top'); ?>
<div class="top_box"><?php if ($listgongg == "yes"): ?><div class="top_post"><div class="title">公 告</div><article class="ulist"><h2><a href="<?php echo BLOG_URL; ?>t"><i class="icon-eject icon-large"></i><?php echo index_t(1); ?></a></h2></article></div><?php else: ?><?php endif; ?>
<?php echo getTopLogs(_g('ggnum'))?></div>
	<?php if (!empty($logs)):foreach($logs as $value):?>
	<article class="post_box">
	<div class="c-top" id="post">
		<div class="datetime">
			<?php echo gmdate('Y', $value['date']); ?>
			<br>
			<?php echo gmdate('m-d', $value['date']); ?>
		</div>
		<header class="tit">
		<h2 class="h1"><a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>
		" rel="bookmark"><?php echo $value['log_title']; ?>
		</a><?php global $timezone; if(time() - $value['date'] < 172800 - $timezone*3600):?>
		<span class="title_new">&nbsp;NEW</span><?php endif;?>
		</h2>
		<aside class="iititle"><span><i class="icon-user icon-large"></i> <?php blog_author($value['author']); ?>
		</span><span><i class="icon-folder-open icon-large"></i><?php blog_sort($value['logid']); ?>
		</span><span><i class="icon-eye-open icon-large"></i> 围观<?php echo $value['views']; ?>
		次</span><span><i class="icon-comment-alt icon-large"></i><?php if($value['comnum']):?>
		<?php echo $value['comnum']; ?>
		条评论</a><?php else:?>
		暂无</a><?php endif;?>
		</span></aside></header>
	</div>
	<div class="c-con">
		<a href="<?php echo $value['log_url']; ?>" class="disp_a" rel="bookmark" title="<?php echo $value['log_title']; ?>">
         <?php if ($listimg == "yes"): ?>
		<?php $thum_src = getThumbnail($value['logid']);$imgFileArray = glob("content/templates/frontopen2/images/random/*.*");$imgsrc = preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $value['content'], $img);$imgsrc = !empty($img[1]) ? $img[1][0] : ''; ?>
<?php if ($thum_src):?> 
<img src="<?php echo $thum_src; ?>" class="attachment-thumbnail wp-post-image" alt="" width="196" height="140" />
<?php elseif($imgsrc): ?>
<img src="<?php echo $imgsrc; ?>" class="attachment-thumbnail wp-post-image" alt="" width="196" height="140" />
<?php else: ?>
<img src="<?php echo BLOG_URL; ?><?php echo $imgFileArray[array_rand($imgFileArray)]; ?>" width="196" height="140" class="attachment-thumbnail wp-post-image" alt=""/>
<?php endif; ?>
<?php else: ?>	
<?php endif; ?>
<?php echo $value['log_description'] = handlearticledes(subString(trim(strip_tags($value['log_description'])), 0,_g('dis_num')));?>
		</a><a href="<?php echo $value['log_url']; ?>" class="more-link">阅 读 全 部 &gt;</a>
		<div class="cls">
		</div>
	</div>
	<div class="c-bot">
		<aside class="cb_bq"><i class="icon-tag icon-large"></i><?php blog_tag($value['logid']); ?>
		</aside>
		<div class="cls">
		</div>
	</div>
	</article>
	<?php endforeach;else:?>
	<h2>未找到</h2>
	<p>
		抱歉，没有符合您查询条件的结果。
	</p>
	<?php endif;?>
	<div class="cls">
	</div>
	<div class="page_num">
		<?php echo $page_url;?>
	</div>
	<div class="cls">
	</div>
</div>
<?php }else{?>
<div id="container"><div id="content" role="main"><?php if (!empty($logs)):?><h1 class="page-title">分类目录归档：<span><?php echo $sortName;?><?php echo $_GET['keyword'];?></span></h1><?php else:?><h1 class="page-title">你搜索的关键词：<span><?php echo $_GET['keyword'];?></span></h1><?php endif;?>
<?php if (!empty($logs)):foreach($logs as $value):?>
	<article class="post_box">
	<div class="c-top" id="post">
		<div class="datetime">
			<?php echo gmdate('Y', $value['date']); ?>
			<br>
			<?php echo gmdate('m-d', $value['date']); ?>
		</div>
		<header class="tit">
		<h2 class="h1"><a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>
		" rel="bookmark"><?php echo $value['log_title']; ?>
		</a><?php global $timezone; if(time() - $value['date'] < 172800 - $timezone*3600):?>
		<span class="title_new">&nbsp;NEW</span><?php endif;?>
		</h2>
		<aside class="iititle"><span><i class="icon-user icon-large"></i> <?php blog_author($value['author']); ?>
		</span><span><i class="icon-folder-open icon-large"></i><?php blog_sort($value['logid']); ?>
		</span><span><i class="icon-eye-open icon-large"></i> 围观<?php echo $value['views']; ?>
		次</span><span><i class="icon-comment-alt icon-large"></i><?php if($value['comnum']):?>
		<?php echo $value['comnum']; ?>
		条评论</a><?php else:?>
		暂无</a><?php endif;?>
		</span></aside></header>
	</div>
	<div class="c-con">
		<a href="<?php echo $value['log_url']; ?>" class="disp_a" rel="bookmark" title="<?php echo $value['log_title']; ?>">
         <?php if ($listimg == "yes"): ?>
		<?php $thum_src = getThumbnail($value['logid']);$imgFileArray = glob("content/templates/frontopen2/images/random/*.*");$imgsrc = preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $value['content'], $img);$imgsrc = !empty($img[1]) ? $img[1][0] : ''; ?>
<?php if ($thum_src):?> 
<img src="<?php echo $thum_src; ?>" class="attachment-thumbnail wp-post-image" alt="" width="196" height="140" />
<?php elseif($imgsrc): ?>
<img src="<?php echo $imgsrc; ?>" class="attachment-thumbnail wp-post-image" alt="" width="196" height="140" />
<?php else: ?>
<img src="<?php echo BLOG_URL; ?><?php echo $imgFileArray[array_rand($imgFileArray)]; ?>" width="196" height="140" class="attachment-thumbnail wp-post-image" alt=""/>
<?php endif; ?>
<?php else: ?>	
<?php endif; ?>
<?php echo $value['log_description'] = handlearticledes(subString(trim(strip_tags($value['log_description'])), 0, 490));?>
		</a><a href="<?php echo $value['log_url']; ?>" class="more-link">阅 读 全 部 &gt;</a>
		<div class="cls">
		</div>
	</div>
	<div class="c-bot">
		<aside class="cb_bq"><i class="icon-tag icon-large"></i><?php blog_tag($value['logid']); ?>
		</aside>
		<div class="cls">
		</div>
	</div>
	</article>
	<?php endforeach;else:?>
	<h2>未找到</h2>
	<p>
		抱歉，没有符合您查询条件的结果。
	</p>
	<?php endif;?>
	<div class="cls">
	</div>
	<div class="page_num">
		<?php echo $page_url;?>
	</div>
	<div class="cls">
	</div>
</div>
</div>
<?php };?>
<?php else: ?>
<div class="mains">	
<?php doAction('index_loglist_top'); ?>
<div class="top_box"><?php if ($listgongg == "yes"): ?><div class="top_post"><div class="title">公 告</div><article class="ulist"><h2><a href="<?php echo BLOG_URL; ?>t"><i class="icon-eject icon-large"></i><?php echo index_t(1); ?></a></h2></article></div><?php else: ?><?php endif; ?>
<?php echo getTopLogs(_g('ggnum'))?></div>
<div class="container-fluid home-fluid">
<div class="row-fluid">
<!--栏目列表开始-->
<?php $sort_cache = $CACHE->readCache('sort');
                if (!empty($sort_cache)):
                    foreach ($sort_cache as $value):
                        if ($value['pid'] != 0)
                            continue;
                        ?>
<section class="span4 home-recent">
<div class="cms-box">
<div class="cms-title"> <span class="icon"> <i class="icon-list icon-large"></i> </span><h2><?php echo $value['sortname']; ?></h2></div>
<div class="cms-content">
<ul class="news-list">
<?php
                                $sqlSegment = '';
                                if ($value['pid'] != 0 || empty($value['children'])) {
                                    $sqlSegment = "and sortid={$value['sid']}";
                                } else {
                                    $sortids = array_merge(array($value['sid']), $value['children']);
                                    $sqlSegment = "and sortid in (" . implode(',', $sortids) . ")";
                                }
                                $sqlSegment .= " order by date desc";
                                $logs = $Log_Model->getLogsForHome($sqlSegment, 1, 5);
                                foreach ($logs as $row) :
                                    ?>
                                <li><span><?php echo gmdate('Y.n.j', $row['date']); ?></span><a href="<?php echo $row['log_url']; ?>" title="<?php echo $row['log_title']; ?>" ><i class="icon-angle-right icon-large"></i> <?php echo subString($row['log_title'], 0, 17); ?></a></li>
                                <?php endforeach; ?>
</ul>
</div>
</div>
</section><?php endforeach;endif;?>
<!--栏目列表结束-->
</div>
</div>
</div>
<?php endif; ?>
<?php
 include View::getView('side');
 include View::getView('footer');
?>