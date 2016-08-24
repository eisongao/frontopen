<?php 
/**
 * 侧边栏组件、页面模块
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
if (!function_exists('_g')) {
	emMsg('请先安装<a href="https://github.com/Baiqiang/em_tpl_options" target="_blank">模板设置插件</a>', BLOG_URL . 'admin/plugins.php');
}
?>
<?php
//widget：blogger
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
	 <li id="linkcat" class="widget-container widget_links"><h3 class="widget-title"><?php echo $title; ?></h3>
	 <ul id="ds-recent-comments">
	<div id="bloggerinfoimg">
	<?php if (!empty($user_cache[1]['photo']['src'])): ?>
	<img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>" width="<?php echo $user_cache[1]['photo']['width']; ?>" height="<?php echo $user_cache[1]['photo']['height']; ?>" alt="blogger" />
	<?php endif;?>
	</div>
	<div id="bloggerinfo">
                <strong><?php echo $name; ?></strong>
                <p><?php echo $user_cache[1]['des']; ?><p>
            </div>
</ul>
    </li>
<?php }?>
<?php
//widget：日历
function widget_calendar($title){ ?>
	<li class=" widget-container">
	<h3 class="widget-title"><?php echo $title; ?></h3>
	<div id="calendar">
	</div>
	<script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
	</li>
<?php }?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<li id="tag_cloud" class="widget-container widget_tag_cloud"><h3 class="widget-title"><?php echo $title; ?></h3><div class="tagcloud"><?php 
		shuffle ($tag_cache);
		 $tag_cache = array_slice($tag_cache,0,43);
		foreach($tag_cache as $value): ?>
        <a  href="<?php echo Url::tag($value['tagurl']); ?>"  class="tag-link-<?php echo rand(12, 49) ?>" style="font-size: 14px;"><?php echo $value['tagname']; ?>(<?php echo $value['usenum']; ?>)</a><?php endforeach; ?></div></li>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
	<li id="gsort" class="widget-container widget_links"><h3 class="widget-title"><?php echo $title; ?></h3>
	<ul class="xoxo blogroll"><?php foreach($sort_cache as $value):if ($value['pid'] != 0) continue;?><li class="line-b-r"> <a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a></li><?php endforeach; ?></ul></li>
<?php }?>
<?php
//widget：最新微语
function widget_twitter($title){
	global $CACHE; 
	
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	
	?>
<li id="ds-comments" class="widget-container"><h3 class="widget-title"><?php echo $title; ?></h3>
<ul id="ds-recent-comments">
    <?php foreach($newtws_cache as $value):?>
<li class="ds-comment side-avatars"><div class="ds-avatar"><a rel="nofollow author" target="_blank" href="<?php echo $url; ?>" onclick="this.href='<?php echo $url; ?>" title="<?php echo $value['autohor']; ?>"><img src="<?php $user_cache = Cache::getInstance()->readCache('user'); echo getGravatar($user_cache[1]['mail'],70);?>" id="sidegravatar"></a></div><div class="ds-meta"><?php $user_cache = Cache::getInstance()->readCache('user'); echo $user_cache[1]['name']; ?><span class="ds-time">&nbsp;<?php echo gmdate('Y-n-j G:i', $value['date']); ?> </span></div><a class="ds-excerpt"><?php echo $value['t']; ?><?php echo $img;?></a></li><?php endforeach; ?></ul></li>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	?>
	<li id="ds-comments" class="widget-container"><h3 class="widget-title"><?php echo $title; ?></h3><ul id="ds-recent-comments"><?php foreach($com_cache as $value):$url = Url::comment($value['gid'], $value['page'], $value['cid']);	$value['content'] = preg_replace("|\[em_(\d+)\]|i",'<img src="' . BLOG_URL. 'admin/editor/plugins/emoticons/images/$1.gif" />',$value['content']);?><li class="ds-comment side-avatars"><div class="ds-avatar"><a rel="nofollow author" target="_blank" href="<?php echo $url; ?>" onclick="this.href='<?php echo $url; ?>" title="<?php echo $value['name']; ?>"><img src="<?php echo getGravatar($value['mail']); ?>" id="sidegravatar"></a></div><div class="ds-meta"><a rel="nofollow author" href="<?php echo $url; ?>"><?php echo $value['name']; ?></a><span class="ds-time">&nbsp;<?php echo gmdate('Y-n-j G:i', $value['date']); ?> </span></div><a class="ds-excerpt" href="<?php echo $url; ?>"><?php echo $value['content']; ?></a></li><?php endforeach; ?></ul></li>
<?php }?>
<?php
//widget：最新文章
function widget_newlog($title){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	<li id="advancedrandomposts" class="widget-container widget_advancedrandomposts"><h3 class="widget-title"><?php echo $title; ?></h3><ul class="advanced-random-posts"><?php foreach($newLogs_cache as $value): ?><li><a href="<?php echo Url::log($value['gid']); ?>" title="<?php echo $value['title']; ?>"><?php echo mb_substr($value['title'],0,50,'utf8');?></a></li><?php endforeach; ?></ul></li>
<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){
	$index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
<li id="advancedrandomposts" class="widget-container widget_advancedrandomposts"><h3 class="widget-title"><?php echo $title; ?></h3><ul class="advanced-random-posts"><?php foreach($randLogs as $value): ?><li><a href="<?php echo Url::log($value['gid']); ?>" title="<?php echo $value['title']; ?>"><?php echo mb_substr($value['title'],0,50,'utf8');?></a></li><?php endforeach; ?></ul></li>	
<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
	<li id="advancedrandomposts" class="widget-container widget_advancedrandomposts"><h3 class="widget-title"><?php echo $title; ?></h3><ul class="advanced-random-posts"><?php foreach($randLogs as $value): ?><li><a href="<?php echo Url::log($value['gid']); ?>" title="<?php echo $value['title']; ?>"><?php echo mb_substr($value['title'],0,50,'utf8');?></a></li><?php endforeach; ?></ul></li>
<?php }?>
<?php
//widget：搜索
function widget_search($title){ ?>
    <li id="search-2" class="widget-container widget_search"><form role="search" method="get" id="searchform" class="searchform" action="<?php echo BLOG_URL; ?>index.php">
				<div>
					<label class="screen-reader-text" for="s">搜索：</label>
					<input type="text" value="" name="keyword" id="s">
					<input type="submit" id="searchsubmit" value="搜索">
				</div>
			</form></li>
<?php } ?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<li id="linkcat" class="widget-container widget_links"><h3 class="widget-title"><?php echo $title; ?></h3><ul class='xoxo blogroll'><?php foreach($record_cache as $value): ?><li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li><?php endforeach; ?></ul></li>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){?>
	<li class="widget-container">
		<h3 class="widget-title"><?php echo $title; ?></h3>
	<ul>
	<?php echo $content; ?>
	</ul>
	</li>
<?php } ?>
<?php
//widget：链接
function widget_link($title, $isLog = false, $isPage = false){
	$isHome = blog_tool_ishome();
    if ($isHome && !in_array('index', _g('links'))) return;//是否首页
    if (!$isHome && !$isLog && !in_array('list', _g('links'))) return;//是否列表页
    if ($isPage && !in_array('page', _g('links'))) return;//是否自建页面
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
	?>

	<li id="linkcat" class="widget-container widget_links"><h3 class="widget-title"><?php echo $title; ?></h3><ul class='xoxo blogroll'><?php foreach($link_cache as $value): ?><li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li><?php endforeach; ?></ul></li>
<?php }?>
<?php
//blog：导航
function blog_navi(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
	<?php
	foreach($navi_cache as $value):

        if ($value['pid'] != 0) {
            continue;
        }

		if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):
			?>
	<li  class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item"><a href="<?php echo BLOG_URL; ?>/admin">管理</a>
     <ul class="sub-menu">
     <li  class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo BLOG_URL; ?>admin/comment.php">评论</a></li>
     <li  class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo BLOG_URL; ?>admin/write_log.php">发表</a></li>
     <li  class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
    </ul>
    </li>
			<?php 
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current-menu-item' : '';
		?>
		<li  class="menu-item-type-post_type <?php echo $current_tab;?>">
			<a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a>
			<?php if (!empty($value['children'])) :?>
            <ul class="sub-menu">
                <?php foreach ($value['children'] as $row){
                        echo '<li  class="menu-item menu-item-type-post_type menu-item-object-page"><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>

            <?php if (!empty($value['childnavi'])) :?>
            <ul class="sub-menu">
                <?php foreach ($value['childnavi'] as $row){
                        $newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
                        echo '<li  class="menu-item menu-item-type-post_type menu-item-object-page"><a href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>

		</li>
	<?php endforeach; ?>
<?php }?>
<?php
//blog：置顶
function topflg($top, $sortop='n', $sortid=null){
    if(blog_tool_ishome()) {
       echo $top == 'y' ? "<img src=\"".TEMPLATE_URL."/images/top.png\" title=\"首页置顶文章\" /> " : '';
    } elseif($sortid){
       echo $sortop == 'y' ? "<img src=\"".TEMPLATE_URL."/images/sortop.png\" title=\"分类置顶文章\" /> " : '';
    }
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == 'admin' || $author == UID ? '<span><i class="icon-edit icon-large"></i> <a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" class="post-edit-link" target="_blank">编辑</a></span>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
    <a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
	<?php endif;?>
<?php }?>
<?php
//blog：日志标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = ' ';
		foreach ($log_cache_tags[$blogid] as $key=>$value){
			$tag .= "<a href=\"".Url::tag($value['tagurl'])."\" class=\"tag".$key."\">".$value['tagname'].' </a>';
		}
		echo $tag.' ';
	}else {
		echo ' 此文暂无标签';
	}
}
?>
<?php
//blog：文章作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻文章
function neighbor_log($neighborLog){
	extract($neighborLog);?>
    <div id="nav-below" class="navigation">
	<?php if($prevLog):?>
    <div class="nav-previous">
    <a href="<?php echo Url::log($prevLog['gid']) ?>" rel="prev">
    <span class="meta-nav"><i class="icon-arrow-left"></i></span> <?php echo $prevLog['title'];?></a>
    </div>
	<?php else:?>
    <div class="nav-previous">
    <a rel="prev"><span class="meta-nav"><i class="icon-arrow-left"></i></span> 上一篇：没有咯</a>
    </div>
	<?php endif;?>
	<?php if($nextLog):?>
    <div class="nav-next">
    <a href="<?php echo Url::log($nextLog['gid']) ?>" rel="next"><?php echo $nextLog['title'];?> <i class="icon-arrow-right"></i></a>
    </div>
	<?php else:?>
    <div class="nav-next"><a rel="next">下一篇：没有咯 <i class="icon-arrow-right"></i></a></div>	<?php endif;?>
    </div>
	<?php }?>
<?php
//blog：评论列表
function blog_comments($comments,$comnum){
    extract($comments);
    if($commentStacks): ?>
	<a name="comments" class="comment-top"></a>
    <h3 id="comments" class="title">
		<strong>网友评论(<?php echo $comnum;?>)</strong>
	</h3>
	<?php endif; ?>
	<?php
	$isGravatar = Option::get('isgravatar');
	foreach($commentStacks as $cid):
    $comment = $comments[$cid];
	$comment['content'] = preg_replace("|\[em_(\d+)\]|i",'<img src="' . BLOG_URL. 'admin/editor/plugins/emoticons/images/$1.gif" />',$comment['content']);
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<div class="comment clearfix" id="comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<?php if($isGravatar == 'y'): ?><div class="avatar"><img src="<?php echo getGravatar($comment['mail']); ?>" /></div><?php endif; ?>
			<div class="comment-info">
                <div class="comment-usrinfo"><?php echo $comment['poster']; ?> <?php $mail_str="\"".strip_tags($comment['mail'])."\"";echo_levels($mail_str,"\"".$comment['url']."\""); ?></div>
				<div class="comment-content"><?php echo $comment['content']; ?></div>
				<span class="comment-time"><?php echo $comment['date']; ?></span> &nbsp; <span id="comment-reply"><span class="ds-icon ds-icon-reply"></span><a  href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></span>
			</div>
		<?php blog_comments_children($comments, $comment['children']); ?>
	</div>
	<?php endforeach; ?>
	<?php if($commentPageUrl) {?>
<div class="page_num">
	    <?php echo $commentPageUrl;?>
    </div>
    <div class="cls">
	</div>
	<?php } ?>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child) {
	$comment = $comments[$child];
	$comment['content'] = preg_replace("|\[em_(\d+)\]|i",'<img src="' . BLOG_URL. 'admin/editor/plugins/emoticons/images/$1.gif" />',$comment['content']);
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<div class="comment-children" id="comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<?php if($isGravatar == 'y'): ?><div class="avatar"><img src="<?php echo getGravatar($comment['mail']); ?>" /></div><?php endif; ?>
		<div class="comment-info">
        <div class="comment-usrinfo"><?php echo $comment['poster']; ?> <?php $mail_str="\"".strip_tags($comment['mail'])."\"";echo_levels($mail_str,"\"".$comment['url']."\""); ?></div>
			<div class="comment-content"><?php echo $comment['content']; ?></div>
			<span class="comment-time"><?php echo $comment['date']; ?></span><?php if($comment['level'] < 4): ?> &nbsp; <a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a>
			<?php endif; ?>
		</div>
		<?php blog_comments_children($comments, $comment['children']);?>
	</div>
	<?php } ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
	<div id="comment-place">
	<div class="comment-post" id="comment-post">
		<a name="respond"></a>
<div class="comment-header"><b>发布评论</b><?php if(ROLE == 'admin' || ROLE == 'writer'): ?><?php else:?><?php if($ckname != ''):?><a onclick="show_div()">-更改昵称</a><?php endif;?><?php endif;?><p><a href="javascript:void(0);" onclick="cancelReply()" id="cancel-reply" style="display:none">取消回复</a></p></div>
<div id="respond" class="no_webshot">
	<form  method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
		<div class="comt">
			<div class="comt-box">
				<textarea placeholder="其实，你的评论很给力！" class="input-block-level comt-area" name="comment" id="comment" cols="100%" rows="3" tabindex="1" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" <?php if($ckname == ''):?> onclick="show_div()"<?php endif;?>></textarea>
				<div class="comt-ctrl">
                	<div class="comt-tips">
                    <input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
                    <input type="hidden" name="gid" value="<?php echo $logid; ?>" />
                    <span data-type="comment-insert-smilie" class="muted comt-smilie"><i class="icon-smile icon-white icon12"></i> 表情</span>
                    <div class="comt-tip comt-loading"><?php echo $verifyCode; ?></div>
                    </div>
               <button type="submit" name="submit" id="submit" ><i class="icon-ok-circle icon-white icon12"></i> 提交评论</button>
				</div>
			</div>
                 <div id="show"></div>

			<?php if(ROLE == 'visitor'): ?>

												<div class="comt-comterinfo" id="comment-author-info" style="display:none;">
						<ul>
							<li class="form-inline"><label class="hide" for="author">昵称</label><input class="ipt" type="text" name="comname" id="author" value="<?php echo $ckname; ?>" tabindex="2" placeholder="昵称"><span class="text-muted">昵称 (必填)</span></li>
							<li class="form-inline"><label class="hide" for="email">邮箱</label><input class="ipt" type="text" name="commail" id="email" value="<?php echo $ckmail; ?>" tabindex="3" placeholder="邮箱"><span class="text-muted">邮箱 (必填)</span></li>
							<li class="form-inline"><label class="hide" for="url">网址</label><input class="ipt" type="text" name="comurl"  id="url" value="<?php echo $ckurl; ?>" tabindex="4" placeholder="网址"><span class="text-muted">网址</span></li>
						</ul>
					</div>
							
                             <?php else:
          $CACHE = Cache::getInstance();
	       $user_cache = $CACHE->readCache('user');
        ?>
		<?php endif; ?>
        		</div>
	</form>
    </div>
  </div>
  </div>
	<?php endif; ?>
    <?php }?>

<?php
//blog-tool:判断是否是首页
function blog_tool_ishome(){
    if (BLOG_URL . trim(Dispatcher::setPath(), '/') == BLOG_URL){
        return true;
    } else {
        return FALSE;
    }
}
?>

<?php
//获取附件第一张图片
function getThumbnail($blogid){
    $db = MySql::getInstance();
    $sql = "SELECT * FROM ".DB_PREFIX."attachment WHERE blogid=".$blogid." AND (`filepath` LIKE '%jpg' OR `filepath` LIKE '%gif' OR `filepath` LIKE '%png') ORDER BY `aid` ASC LIMIT 0,1";
    //die($sql);
    $imgs = $db->query($sql);
    $img_path = "";
    while($row = $db->fetch_array($imgs)){
         $img_path .= BLOG_URL.substr($row['filepath'],3,strlen($row['filepath']));
    }
    return $img_path;
}
?>
<?php
function handlearticledes($des) {
	$str = preg_replace("/(<\/?)(\w+)([^>]*>)/e",'',$des);
	$str = preg_replace("/阅读全文&gt;&gt;/",'',$str);
	$str = strip_tags($str,""); 
$str = ereg_replace("\t","",$str); 
$str = ereg_replace("\r\n","",$str); 
$str = ereg_replace("\r","",$str); 
$str = ereg_replace("\n","",$str); 
$str = ereg_replace(" "," ",$str); 
	return mb_substr($str,0,200,'utf8').'...';
}
?>
<?php
function index_t($num){
	$t = MySql::getInstance();
	?>
	<?php
	$sql = "SELECT id,content,img,author,date,replynum FROM ".DB_PREFIX."twitter ORDER BY `date` DESC LIMIT $num";
	$list = $t->query($sql);
	while($row = $t->fetch_array($list)){
	?>
	<?php echo $row['content'];?>
	<?php }?>
<?php } ?>
<?php
	function getTopLogs($num) {
    $db = MySql::getInstance();
	$ver= Option::EMLOG_VERSION;
   if($ver == '5.3.0') 
{
 $sql = "SELECT gid,title,content,date FROM ".DB_PREFIX."blog WHERE type='blog' and top='y' or sortop='y' ORDER BY `top` DESC ,`date` DESC LIMIT 0,$num";}
else
{
$sql = "SELECT gid,title,content,date FROM ".DB_PREFIX."blog WHERE type='blog' and top='y'  ORDER BY `top` DESC ,`date` DESC LIMIT 0,2";
}
        $list = $db->query($sql);
        while($row = $db->fetch_array($list)){ ?>
<div class="top_post"><div class="title">置 顶</div><article class="ulist"><h2><a href="<?php echo Url::log($row['gid']); ?>" title="<?php echo $row['log_description']; ?>" target="_blank"><i class="icon-eject icon-large"></i><?php echo $row['title']; ?></a><span><?php echo gmdate('Y-n-j', $row['date']); ?></span></h2></article></div>
		<?php }?>
 <?php } ?>

<?php
	function related_logs($logData = array())
	{
	$configfile = EMLOG_ROOT.'/content/templates/frontopen2/config.php';
	if (is_file($configfile)) {
	require $configfile;
	}else{
	    $related_log_type = 'sort';//相关日志类型，sort为分类，tag为日志；
	    $related_log_sort = 'rand';//排列方式，views_desc 为点击数（降序）comnum_desc 为评论数（降序） rand 为随机 views_asc 为点击数（升序）comnum_asc 为评论数（升序）
	    $related_log_num = '10'; //显示文章数，排版需要，只能为10
	    $related_inrss = 'y'; //是否显示在rss订阅中，y为是，其它值为否
	    }
	    global $value;
	    $DB = MySql::getInstance();
	    $CACHE = Cache::getInstance();
	    extract($logData);
	    if($value)
	    {
	        $logid = $value['id'];
	        $sortid = $value['sortid'];
	        global $abstract;
	    }
	    $sql = "SELECT gid,title FROM ".DB_PREFIX."blog WHERE hide='n' AND type='blog'";
	    if($related_log_type == 'tag')
	    {
	        $log_cache_tags = $CACHE->readCache('logtags');
	        $Tag_Model = new Tag_Model();
	        $related_log_id_str = '0';
	        foreach($log_cache_tags[$logid] as $key => $val)
	        {
	            $related_log_id_str .= ','.$Tag_Model->getTagByName($val['tagname']);
	        }
	        $sql .= " AND gid!=$logid AND gid IN ($related_log_id_str)";
	    }else{
	        $sql .= " AND gid!=$logid AND sortid=$sortid";
	    }
	    switch ($related_log_sort)
	    {
	        case 'views_desc':
	        {
	            $sql .= " ORDER BY views DESC";
	            break;
	        }
	        case 'views_asc':
			{
	            $sql .= " ORDER BY views ASC";
	            break;
	        }
	        case 'comnum_desc':
	        {
	            $sql .= " ORDER BY comnum DESC";
	            break;
	        }
	        case 'comnum_asc':
	        {
	            $sql .= " ORDER BY comnum ASC";
	            break;
	        }
	        case 'rand':
	        {
	            $sql .= " ORDER BY rand()";
	            break;
	        }
	    }
	    $sql .= " LIMIT 0,$related_log_num";
	    $related_logs = array();
	    $query = $DB->query($sql);
	    while($row = $DB->fetch_array($query))
	    {
	        $row['gid'] = intval($row['gid']);
	        $row['title'] = htmlspecialchars($row['title']);
	        $related_logs[] = $row;
	    }
	    $out = '';
	    if(!empty($related_logs))
	    {
	        foreach($related_logs as $val)
	        {
	            $out .= "<li><a href=\"".Url::log($val['gid'])."\">{$val['title']}</a></li>";
	        }
	    }
	    if(!empty($value['content']))
	    {
	        if($related_inrss == 'y')
	        {
	            $abstract .= $out;
	        }
	    }else{
	        echo $out;
	    }
	}	 
?>
<?php
function indexLogList($num=3){
	$Log_Model = new Log_Model();
	$time = time();
	$randLogs = $Log_Model-> getLogsForHome(" ORDER BY date DESC",1,$num);
	foreach($randLogs as $value):
		?>
<li><a href="<?php echo $value[log_url];?>"><?php $thum_src = getThumbnail($value['logid']);$imgFileArray = glob("content/templates/frontopen2/images/random/*.*");$imgsrc = preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $value['content'], $img);$imgsrc = !empty($img[1]) ? $img[1][0] : ''; ?>
<?php if ($thum_src):?> 
<img src="<?php echo $thum_src; ?>" alt="<?php echo $value['log_title'] ?>"/>
<?php elseif($imgsrc): ?>
<img src="<?php echo $imgsrc; ?>" alt="<?php echo $value['log_title'] ?>"/>
<?php else: ?>
<img src="<?php echo BLOG_URL; ?><?php echo $imgFileArray[array_rand($imgFileArray)]; ?>" alt="<?php echo $value['log_title'] ?>"/>
<?php endif; ?></a><div class="type_text"><p class="title"><?php echo $value['log_title'] ?></p></div></li>
		<?php
	endforeach;
}
?>

<?php
//comment：输出评论人等级
function echo_levels($comment_author_email,$comment_author_url){
  $DB = MySql::getInstance();
  global $CACHE;$user_cache = $CACHE->readCache('user'); 
  $adminEmail = '"'.$user_cache[1]['mail'].'"';
  if($comment_author_email==$adminEmail)
  {
    echo '<a class="vip" href="mailto:'.$user_cache[1]['mail'].'" title="管理员认证"></a><a class="vip7" title="特别认证"></a>';
  }
  $sql = "SELECT cid as author_count,mail FROM ".DB_PREFIX."comment WHERE mail != '' and mail = $comment_author_email and hide ='n'";
  $res = $DB->query($sql);
  $author_count = mysql_num_rows($res);
   if($author_count>=2 && $author_count<10 && $comment_author_email!=$adminEmail)
    echo '<a class="vip1" title="路过酱油 LV.1"></a>';
  else if($author_count>=10 && $author_count<20 && $comment_author_email!=$adminEmail)
    echo '<a class="vip2" title="偶尔光临 LV.2"></a>';
  else if($author_count>=20 && $author_count<40 && $comment_author_email!=$adminEmail)
    echo '<a class="vip3" title="常驻人口 LV.3"></a>';
  else if($author_count>=40 && $author_count<80 && $comment_author_email!=$adminEmail)
    echo '<a class="vip4" title="以博为家 LV.4"></a>';
  else if($author_count>=80 &&$author_count<160 && $comment_author_email!=$adminEmail)
    echo '<a class="vip5" title="情牵小博 LV.5"></a>';
  else if($author_count>=160 && $author_coun<320 && $comment_author_email!=$adminEmail)
    echo '<a class="vip6" title="为博终老 LV.6"></a>';
  else if($author_count>=50 && $author_coun<60 && $comment_author_email!=$adminEmail)
    echo '<a class="vip7" title="三世情牵 LV.7"></a>';
}
?>
<?php
function timer_start() {
  global $timestart;
  $mtime = explode( ' ', microtime() );
  $timestart = $mtime[1] + $mtime[0];
  return true;
}
timer_start();
 
function timer_stop( $display = 0, $precision = 3 ) {
  global $timestart, $timeend;
  $mtime = explode( ' ', microtime() );
  $timeend = $mtime[1] + $mtime[0];
  $timetotal = $timeend - $timestart;
  $r = number_format( $timetotal, $precision );
  if ( $display )
    echo $r;
  return $r;
}
?>
<?php 
function is_mobile() {
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$mobile_browser = Array(
		"mqqbrowser", //手机QQ浏览器
		"opera mobi", //手机opera
		"juc","iuc",//uc浏览器
		"fennec","ios","applewebKit/420","applewebkit/525","applewebkit/532","ipad","iphone","ipaq","ipod",
		"iemobile", "windows ce",//windows phone
		"240x320","480x640","acer","android","anywhereyougo.com","asus","audio","blackberry","blazer","coolpad" ,"dopod", "etouch", "hitachi","htc","huawei", "jbrowser", "lenovo","lg","lg-","lge-","lge", "mobi","moto","nokia","phone","samsung","sony","symbian","tablet","tianyu","wap","xda","xde","zte"
	);
	$is_mobile = false;
	foreach ($mobile_browser as $device) {
		if (stristr($user_agent, $device)) {
			$is_mobile = true;
			break;
		}
	}
	return $is_mobile;
}
?>

<?php
//文章关键词
function log_key_words($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .="".$value['tagname'].',';
		}
		echo substr($tag,0,-1);
	}
}
?>