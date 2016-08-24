<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="container"><div id="content" role="main" style="width:96%"><div class="mbx"><i class="icon-home icon-large" style="font-size:14px;"></i>&nbsp;<a href="<?php echo BLOG_URL; ?>" class="gray">首页</a> &gt;<?php blog_sort($logid); ?> &gt; <?php echo $log_title; ?></div>
<div id="post" class="post type-post status-publish format-standard hentry">
<div class="c-top2" id="post"><div class="datetime"><?php echo gmdate('Y', $date); ?><br><?php echo gmdate('m-d', $date); ?></div> <header class="tit"><h1 class="entry-title"><?php echo $log_title; ?></h1><aside class="entry-meta iititle2"> <span><i class="icon-user icon-large"></i> <?php blog_author($author); ?></span><span><i class="icon-folder-open icon-large"></i> <?php blog_sort($logid); ?></span><span><i class="icon-eye-open icon-large"></i> 围观<?php echo $views; ?>次</span><span><i class="icon-comment-alt icon-large"></i> <?php if($comnum):?><?php echo $comnum; ?>条评论<?php else:?>暂无<?php endif;?></span><span><i class="icon-pencil icon-large"></i> 编辑日期：<time><?php echo gmdate('Y-m-d', $date); ?></time></span> <span><i class="icon-zoom-in icon-large"></i> 字体：<a href="javascript:;" onclick="checkFontSize(18)">大</a> <a href="javascript:;" onclick="checkFontSize(16)">中</a> <a href="javascript:;" onclick="checkFontSize(14)">小</a></span> <?php editflg($logid,$author); ?> </aside></header><div class="cls"></div></div>
<article class="entry-content"><?php echo $log_content; ?>
<div class="loc_link"><ul>
<li>本文固定链接: <a href="<?php echo Url::log($logid);?>"><?php echo Url::log($logid);?></a></li>
<li>转载请注明: : <?php blog_author($author); ?> <?php echo gmdate('Y年n月j日', $date); ?> 于 <a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a> 发表</li>
</ul>
</div>
<div style="margin-top:10px;text-align:center;">
<?php doAction('log_related', $logData); ?>
<?php if ($bdshare == "yes"): ?>
<div id="bdshare" class="bdsharebuttonbox bdshare-button-style" ><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a> <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a> <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a> <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a> <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a> <a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a> <a href="#" class="bds_twi" data-cmd="twi" title="分享到Twitter"></a> <a href="#" class="bds_more" data-cmd="more"></a></div><br /><script>
window._bd_share_config = {
	"common": {
		"bdSnsKey": {
			"tsina": "920445423",
			"tqq": "801457183"
		},
		"bdText": "",
		"bdMini": "2",
		"bdMiniList": false,
		"bdPic": "",
		"bdStyle": "0",
		"bdSize": "32"
	},
	"share": {},
	"image": {
		
	},
	
};
with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=86835285.js?cdnversion=' + ~ (-new Date() / 36e5)];
</script>
<?php else: ?>	
<?php endif; ?>
</div><div class="cls"></div>
<?php global $CACHE;$user_cache = $CACHE->readCache('user');$name = $user_cache[$author]['mail'] != '' ? "".$user_cache[$author]['name']."" : $user_cache[1]['name'];?>
<div class="author_info"><div class="au_top_bar"><div class="edit_date">最后编辑：<time><?php echo gmdate('Y-m-d', $date); ?></time></div><b>作者：<?php echo $name; ?></b></div><div class="avatar"><?php if($user_cache[$author]['photo']['src']):?><?php global $CACHE;$user_cache = $CACHE->readCache('user'); if (!empty($user_cache[$author]['photo']['src'])): ?><img src="<?php echo BLOG_URL.$user_cache[$author]['photo']['src']; ?>" class="avatar avatar-96 photo" height="96" width="96" data-bd-imgshare-binded="1" style="opacity: 1;"><?php endif; ?><?php else:?><img src="<?php echo getGravatar($user_cache[$author]['mail']); ?>" class="avatar avatar-96 photo" height="96" width="96" data-bd-imgshare-binded="1" style="opacity: 1;"><?php endif; ?></div><div class="type_out"><span class="ttxx"><?php if($user_cache[$author]['des']):?><?php echo $user_cache[$author]['des']; ?><?php else:?>这个人很懒什么也没留！~<?php endif; ?></span><div class="au_links"><a href="<?php echo Url::author($author);?>" class="c1"><i class="icon-home"></i> 站内专栏</a> <a href="mailto:<?php echo $user_cache[$author]['mail']?>" class="c3"><i class="icon-envelope"></i> 邮箱</a></div></div><div class="cls"></div></div>
<?php if ($jzeng == "yes"): ?>
<?php if(_g('j_zeng')){?>
<div class="j_zeng"> <a href="<?php echo _g('j_zeng'); ?>" target="_blank" class="jz_bt" rel="external nofollow">捐  赠</a><span>如果您觉得这篇文章有用处，请支持作者！鼓励作者写出更好更多的文章！</span></div> 
<?php }?>
<?php else: ?>	
<?php endif; ?>
</article></div>
<div class="c-bot"><aside class="cb_bq"><i class="icon-tag icon-large"></i><?php blog_tag($logid); ?></aside><div class="cls"></div></div>  <br><?php neighbor_log($neighborLog); ?>
<div class="cls"></div>
<?php if(_g('guanggaos') && !is_mobile()) {?>
                    <div class="ad_2">
						<?php echo _g('guanggaos'); ?>
                    </div>
                <?php }else{?>
                    <div class="ad_2">
					<?php echo _g('mobile_ad'); ?>
                    </div>
                <?php }?>
<div class="relatedposts"><h3 class="widget-title"><i class="icon-warning-sign"></i> 您可能还会对这些文章感兴趣！</h3><ul>
<?php if ($ganxq == "yes"): ?>
<?php related_logs($logData);?> 
<?php else: ?>	
<?php $index_hotlognum = Option::get('index_hotlognum');	$Log_Model = new Log_Model();	$randLogs = $Log_Model->getHotLog(8);?> <?php foreach($randLogs as $value): ?><li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
<?php endforeach; ?>
<?php endif; ?>
</ul><div class="cls"></div></div> 
<div class="comment-list clearfix"><?php blog_comments($comments,$comnum); ?></div>
		<div class="addcomment"><?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?></div>
        </div>
</div>

<?php
 include View::getView('side');
 include View::getView('footer');
?>