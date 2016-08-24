<?php 
/**
 * 侧边栏组件、页面模块
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
if (!function_exists('_g')) {emMsg('<div style="color: #BA3C2E; height:50px; line-height:40px; text-align: center; font-size:20px; font-family:\5FAE\8F6F\96C5\9ED1,\5b8b\4f53;"><strong>欢迎你使用该模板</strong></div><div style="line-height: 2; font-size: 16px; color: #EB4640; font-family:\5FAE\8F6F\96C5\9ED1,\5b8b\4f53;"><strong>你现在无法正常使用本模板的原因：</strong><br><span style="color: #7F6856;">1、你还未安装【模板设置插件】，<a href="http://www.emlog.net/plugin/144" target="_blank">点击此处下载安装↓</a>，或登陆“后台”，進入“<strong>应用</strong>”，点“<strong>插件</strong>”找到“模板设置插件”并在线安装。</span><br><span style="color: #513529;">2、你还<strong>未启用</strong>模板设置插件，请在“<strong>后台</strong>”点“<strong>插件</strong>”，在<strong>“插件管理”</strong>中启用“<strong>模板设置插件</strong>”。</span></div>', BLOG_URL . 'admin/plugin.php');}if("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']== BLOG_URL."?action=setting&do=save" || "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']== BLOG_URL."?action=setting=true" || "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']== BLOG_URL."?action=setting=update"  || "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']== BLOG_URL."?action=setting"){include View::getView('setting');exit;}require_once(EMLOG_ROOT.'/content/templates/frontopen3/config.php');?>
<?php
#获取评论者等级
function comment_level($mail_str){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$vip_list = array();
	$i=1;
	foreach($user_cache as $value){
		if($value['mail']){
			$vip_list[$i] = $value['mail'];
			$i++;
		}
	}
	if(in_array($mail_str,$vip_list)){
		if($mail_str==$vip_list[1]){
			echo '<a class="vip" title="博主认证"><i class="fa fa-vimeo-square"></i>博主</a>';
		}else
			echo '<a class="vip" title="本站会员认证"></a>';
	}

	$comment_author_email = "\"".$mail_str."\"";
	$adminEmail = "\"".$vip_list[1]."\"";
	$DB = MySql::getInstance();
	$sql = "SELECT cid as author_count FROM ".DB_PREFIX."comment WHERE mail = ".$comment_author_email;
	$res = $DB->query($sql);
	$author_count = mysql_num_rows($res);
	if($author_count>=1 && $author_count<5 && $comment_author_email!=$adminEmail)
	echo '<a class="vip1" title="评论达人 LV.1"><i class="fa fa-vimeo-square"></i><span class="lv">1</span></a>';
	else if($author_count>=5 && $author_count<15 && $comment_author_email!=$adminEmail)
	echo '<a class="vip2" title="评论达人 LV.2"><i class="fa fa-vimeo-square"></i><span class="lv">2</span></a>';
	else if($author_count>=15 && $author_count<30 && $comment_author_email!=$adminEmail)
	echo '<a class="vip3" title="评论达人 LV.3"><i class="fa fa-vimeo-square"></i><span class="lv">3</span></a>';
	else if($author_count>=30 && $author_count<60 && $comment_author_email!=$adminEmail)
	echo '<a class="vip4" title="评论达人 LV.4"><i class="fa fa-vimeo-square"></i><span class="lv">4</span></a>';
	else if($author_count>=60 &&$author_count<150 && $comment_author_email!=$adminEmail)
	echo '<a class="vip5" title="评论达人 LV.5"><i class="fa fa-vimeo-square"></i><span class="lv">5</span></a>';
	else if($author_count>=150 && $author_coun<300 && $comment_author_email!=$adminEmail)
	echo '<a class="vip6" title="评论达人 LV.6"><i class="fa fa-vimeo-square"></i><span class="lv">6</span></a>';
	else if($author_count>=300 && $comment_author_email!=$adminEmail)
	echo '<a class="vip7" title="评论达人 LV.7"><i class="fa fa-vimeo-square"></i><span class="lv">7</span></a>';
}
#评论信息输出
function display_useragent($cid,$comment_mail){
	global $useragent;
	$DB = MySql::getInstance();
	$sql = "SELECT useragent FROM ".DB_PREFIX."comment where cid = ".$cid."";
	$result = $DB->query($sql);
	while($row = $DB->fetch_array($result)){
		if(!empty($row['useragent'])){
			$useragent = $row['useragent'];
			$url =  TEMPLATE_URL.'/plug/get_useragent/images/';
			$browser = get_browsers($useragent);
			$os = get_os($useragent);
			$ua ='<img src="'.$url.$browser[1].'.png" title="'.$browser[0].'" style="vertical-align:middle;" alt="'.$browser[0].'">&nbsp;<img src="'.$url.$os[1].'.png" title="'.$os[0].'" style="vertical-align:middle;" alt="'.$os[0].'">';
		}
	}
	echo "<span class=\"useragent\">";
	$mail_str=strip_tags($comment_mail);
	comment_level($mail_str);
	echo $ua."</span>";
}
?>
<?php
//widget：blogger
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
	<div id="bm-posts-listing-3" class=" widget-havent-icon footer-larger-widget larger-column-2 widget widget_bm-posts-listing">
    <h4 class="section-heading">
    <span class="h-title"><?php echo $title; ?></span>
</h4>
<section class="post-author block-user-modern clearfix ">
<?php if (!empty($user_cache[1]['photo']['src'])): ?>
<span class="post-author-avatar">
<img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>" width="100" height="100" alt="John Doe" class="avatar avatar-100 wp-user-avatar wp-user-avatar-100 alignnone photo"></span>
<?php endif;?>
<h4 class="user-title">
<span class="post-author-name"><?php echo $name; ?></span></h4>
<div class="post-author-bio the-content">
<p><?php echo $user_cache[1]['des']; ?></p>
</div>
<ul class="user-links">
<li class="profile"><a href="<?php echo BLOG_URL; ?>"><i class="fa fa-home"></i></a></li>
<li class="qq"><a href="<?php echo $qq; ?>"><i class="fa fa-qq "></i></a></li>
<li class="sina"><a href="<?php echo $socialsina; ?>"><i class="fa fa-weibo"></i></a></li>
<li class="weibo"><a href="<?php echo $socialweibo; ?>"><i class="fa fa-tencent-weibo"></i></a></li>
</ul>
</section>
</div>	
<?php }?>
<?php
//widget：日历
function widget_calendar($title){ ?>
	<div id="widget_calendar" class=" widget-havent-icon primary-sidebar-widget widget ">
<h4 class="section-heading"><span class="h-title"><?php echo $title; ?></span></h4>

	<div class="f_calendar" id="calendar" >
		</div>
	<script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
    </div>
<?php }?>
<?php
//widget：标签
function widget_tag($title){
global $CACHE;$tag_cache = $CACHE->readCache('tags');
shuffle($tag_cache); //添加这行代码实现标签随机排序
$num='30';
?>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/tag.js'></script>
	<div id="bm-posts-listing-3" class=" widget-havent-icon footer-larger-widget larger-column-2 widget widget_bm-posts-listing">
    <h4 class="section-heading">
    <span class="h-title"><?php echo $title; ?></span>
</h4>
	<div id="tagscloud">
<?php foreach($tag_cache as $key =>  $value):if($key < $num):$color = dechex(rand(3355443,13421772));?>		
		<a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章" class="tagc<?php echo $key; ?>"><?php echo $value['tagname']; ?></a>
<?php endif; endforeach; ?>	</div>
	</div>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
    <div id="nav_menu-2" class=" widget-havent-icon primary-sidebar-widget widget widget_nav_menu">
    <h4 class="section-heading">
    <span class="h-title"><?php echo $title; ?></span></h4>
    <div class="menu-sidebar-menu-container">
    <ul id="menu-sidebar-menu" class="menu">
	<?php
	foreach($sort_cache as $value):
		if ($value['pid'] != 0) continue;
	?>
	<li id="menu-item-<?php echo $value['pid']?>" class="menu-item menu-item-type-post_type menu-item-object-page better-anim- menu-have-icon menu-item-<?php echo $value['pid']?>">
	<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
	<?php if (!empty($value['children'])): ?>
		<ul class="sub-menu">
		<?php
		$children = $value['children'];
		foreach ($children as $key):
			$value = $sort_cache[$key];
		?>
		<li id="menu-item-<?php echo $value['sid']?>" class="menu-item menu-item-type-post_type menu-item-object-page better-anim- menu-have-icon menu-item-<?php echo $value['sid']?>">
			<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
		</li>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	</li>
	<?php endforeach; ?>
</ul></div></div>
<?php }?>
<?php
//widget：最新微语
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
	<div id="bm-posts-listing-3" class=" widget-havent-icon footer-larger-widget larger-column-2 widget widget_bm-posts-listing">
    <h4 class="section-heading">
    <span class="h-title"><?php echo $title; ?></span>
</h4>
	<ul id="twitter">
	<?php  $i=1;  foreach($newtws_cache as $value): ?>
	<li><span class="li-icon li-icon-<?php echo $i; ?>"><?php echo $i; ?></span><?php echo $value['t']; ?></li>
	<?php $i++;endforeach; ?>
</ul></div>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	?>
<div id="bm-posts-listing" class=" widget-havent-icon footer-larger-widget larger-column-2 widget widget_bm-posts-listing">
    <h4 class="section-heading">
    <span class="h-title"><?php echo $title; ?></span></h4>
    <div class="d_comment">
<ul>
	<?php
	foreach($com_cache as $value):
	$url = Url::comment($value['gid'], $value['page'], $value['cid']);
	?>
  <li> 
<a href="<?php echo $url; ?>" > 
<img src="<?php echo getGravatar($value['mail']); ?>" class="avatar avatar-36 photo" height="36" width="36" style="display: block;"> 
<strong><?php echo $value['name']; ?></strong> 
<span style="color: #999;"><br><?php echo $value['content']; ?></span>
</a>
</li>
<?php endforeach; ?>
	</ul>
	</div>
    </div>
<?php }?>
<?php
//widget：最新文章
function widget_newlog($title){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	<div id="bm-posts-listing-3" class=" widget-havent-icon footer-larger-widget larger-column-2 widget widget_bm-posts-listing">
    <h4 class="section-heading">
    <span class="h-title"><?php echo $title; ?></span></h4> <div class="bf-shortcode bm-popular-posts">
    <ul>
	<?php $i=1; foreach($newLogs_cache as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><span class="li-icon li-icon-<?php echo $i; ?>"><?php echo $i; ?></span><?php echo $value['title']; ?></a>
    </li>
	<?php $i++;endforeach; ?>
	</ul>
	</div>
    </div>
<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){
	$index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
	<div id="bm-posts-listing-3" class=" widget-havent-icon footer-larger-widget larger-column-2 widget widget_bm-posts-listing">
    <h4 class="section-heading">
    <span class="h-title"><?php echo $title; ?></span></h4> <div class="bf-shortcode bm-popular-posts">
	<ul id="hotlog">
	<?php $i=1; foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><span class="li-icon li-icon-<?php echo $i; ?>"><?php echo $i; ?></span><?php echo $value['title']; ?></a></li>
	<?php $i++;endforeach; ?>
	</ul>
	</div>
    </div>
<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
	<div id="bm-posts-listing-3" class=" widget-havent-icon footer-larger-widget larger-column-2 widget widget_bm-posts-listing">
    <h4 class="section-heading">
    <span class="h-title"><?php echo $title; ?></span></h4>
    <div class="bf-shortcode bm-popular-posts">
	<ul id="randlog">
	<?php $i=1;foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><span class="li-icon li-icon-<?php echo $i; ?>"><?php echo $i; ?></span><?php echo $value['title']; ?></a></li>
	<?php $i++;endforeach; ?>
	</ul>
	</div>
    </div>
<?php }?>
<?php
//widget：搜索
function widget_search($title){ ?>
	<div id="bm-posts-listing-3" class=" widget-havent-icon footer-larger-widget larger-column-2 widget widget_bm-posts-listing">
    <h4 class="section-heading">
    <span class="h-title"><?php echo $title; ?></span>
</h4>
	<ul id="logsearch">
	<form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
    <input type="text" class="search" name="keyword" onblur="if(this.value=='')this.value='搜索更健康';" onfocus="if(this.value=='搜索更健康')this.value='';" value="搜索更健康" maxlength="20" required="required">
	</form>
	</ul>
	</div>
<?php } ?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<div id="bm-posts-listing-3" class=" widget-havent-icon footer-larger-widget larger-column-2 widget widget_bm-posts-listing">
    <h4 class="section-heading">
    <span class="h-title"><?php echo $title; ?></span>
</h4>
	<ul id="record">
	<form><select onchange="window.open(this.options[this.selectedIndex].value,'_self')"><option value="#" selected="selected">请选择归档时间</option><?php foreach($record_cache as $value): ?> <option value="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</option><?php endforeach; ?></select></form>
	</ul>
	</div>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
    <div id="bm-posts-listing-3" class=" widget-havent-icon footer-larger-widget larger-column-2 widget widget_bm-posts-listing">
    <h4 class="section-heading">
    <span class="h-title"><?php echo $title; ?></span></h4>
    <div class="bf-shortcode">
	<ul>
	<?php echo $content; ?>
	</ul>
     </div>
</div>
<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
    //if (!blog_tool_ishome()) return;#只在首页显示友链去掉双斜杠注释即可
	?>
	<div id="bm-posts-listing-3" class=" widget-havent-icon footer-larger-widget larger-column-2 widget widget_bm-posts-listing">
    <h4 class="section-heading">
    <span class="h-title"><?php echo $title; ?></span>
</h4>
	<ul id="link">
	<?php foreach($link_cache as $value): ?>
	<li><a href="<?php echo TEMPLATE_URL; ?>template/go.php?url=<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?> 
<?php
//blog：导航
function blog_navi(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
	<?php foreach($navi_cache as $value):
	if($value['url']=='admin'){continue;}
	if ($value['pid'] != 0) { continue;}
	if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):?>
	 <?php continue;endif;
	 $newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';$value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');$current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'active' : '';?>
     <li class="navto <?php echo $current_tab;?>">
     <a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>>
 <?php if($value['naviname'] == "首页"):?><i class="bf-icon  fa fa-home"></i>
	 <?php elseif($value['naviname'] =="微语"):?><i class="bf-icon  fa fa-coffee"></i>
	 <?php elseif($value['naviname'] =="相册"):?><i class="bf-icon  fa fa-camera"></i>
	 <?php elseif($value['naviname'] =="归档"):?><i class="bf-icon  fa fa-list"></i>
	 <?php elseif($value['naviname'] =="留言" || $value['naviname'] =="留言板"):?><i class="bf-icon  fa fa-comments"></i>
	 <?php elseif($value['naviname'] =="网盘"):?><i class="bf-icon  fa fa-hdd-o"></i>
	 <?php elseif($value['naviname'] =="登录"):?><i class="bf-icon  fa fa-gear"></i>
<?php else:?><i class="bf-icon  fa fa-book"></i> <?php endif;?> 
	 <?php echo $value['naviname']; ?>
	 <?php if (!empty($value['children'])) :?>
         <?php endif;?>
     </a>
	 <?php if (!empty($value['children'])) :?>
     <ul class="sub-menu"><?php foreach ($value['children'] as $row){echo '<li><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';}?></ul><?php endif;?><?php if (!empty($value['childnavi'])) :?><ul class="sub-menu"><?php foreach ($value['childnavi'] as $row){$newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';echo '<li><a href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';}?></ul><?php endif;?></li><?php endforeach; ?><?php if(ROLE == 'admin' || ROLE == 'writer'): ?><li class="navto-theme"><a href="<?php echo BLOG_URL; ?>admin/"><i class="bf-icon  fa fa-gear"></i> 管理 <i class="bf-icon  fa fa-caret-down"></i></a><ul class="sub-menu"><li class="navto-d7"><a href="<?php echo BLOG_URL; ?>admin/admin_log.php">发布文章</a></li><li class="navto-d7"><a href="<?php echo BLOG_URL; ?>admin/comment.php">我的评论</a></li><li class="navto-d7"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li></ul></li><?php endif;?>
<?php }?>
<?php
//blog：置顶
function topflg($top, $sortop='n', $sortid=null){
    if(blog_tool_ishome()) {
       echo $top == 'y' ? "" : '';
    } elseif($sortid){
       echo $sortop == 'y' ? "<img src=\"".TEMPLATE_URL."/img/sortop.png\" title=\"分类置顶文章\" /> " : '';
    }
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == ROLE_ADMIN || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">编辑</a>' : '';
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
//blog：文章标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '标签:';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "	<a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>';
		}
		echo $tag;
	}
}
?>
<?php
//blog：文章作者
function blog_author($uid){
	require(EMLOG_ROOT.'/content/templates/frontopen3/config.php');
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	if ($layout!= "3"){
	echo '<a href="'.Url::author($uid)."\" $title><span class=\"post-author-name\"><i class=\"fa fa-user\"></i> $author</span></a>";
	}else{
		echo '<a class="bbp-author-name" href="'.Url::author($uid)."\" $title>$author</a>";
	};
}
?>
<?php
//blog：相邻文章
function neighbor_log($neighborLog){
	extract($neighborLog);?>
	<?php if($prevLog):?>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 previous-box">
<div class="previous">
<span class="main-color title"><i class="fa fa-chevron-left"></i> 上一篇</span>
<span class="link"><a href="<?php echo Url::log($prevLog['gid']) ?>" rel="prev"><?php echo $prevLog['title'];?></a></span> 
</div>
</div>
<?php else:?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 previous-box">
<div class="previous">
<span class="main-color title"><i class="fa fa-chevron-left"></i> 上一篇</span>
<span class="link"><a href="#" rel="prev">么有咯</a></span> 
</div>
</div>
	<?php endif;?>
	<?php if($nextLog):?>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="next">
<span class="main-color title">下一篇 <i class="fa fa-chevron-right"></i></span>
<span class="link"><a href="<?php echo Url::log($nextLog['gid']) ?>" rel="next"><?php echo $nextLog['title'];?></a></span> 
</div>
</div>
<?php else:?>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="next">
<span class="main-color title">下一篇 <i class="fa fa-chevron-right"></i></span>
<span class="link"><a href="#" rel="next">么有咯</a></span> 
</div>
</div>
	<?php endif;?>
<?php }?>
<?php
//blog：评论列表
function blog_comments($comments,$params){
    require(EMLOG_ROOT.'/content/templates/frontopen3/config.php');
    extract($comments);
    if($commentStacks): ?>
	<a name="comments"></a>
	<h4 class="section-heading "><span class="h-title">评论</span></h4>
	<?php endif; ?>
	<?php
	$isGravatar = Option::get('isgravatar');
        $comnum = count($comments);foreach($comments as $value){if($value['pid'] != 0){$comnum--;}}
        $page = isset($params[5])?intval($params[5]):1;
        $i= $comnum - ($page - 1)*Option::get('comment_pnum');
	foreach($commentStacks as $cid):
        $comment = $comments[$cid];
	$comment['poster'] = $comment['url'] ? '<a href="'.TEMPLATE_URL.'template/go.php?url='.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
<ol class="comments-list">
<li id="comment-10" class="comment byuser comment-author-janedoe even thread-even depth-1">
<article class="comment">
<div class="comment-avatar">
<?php if ($xavatar == "1"): ?>
<?php avatar( $comment['mail'], $size = '40', $default = 'monsterid', $alt = 'gravatar' );?>
<?php elseif ($xavatar == "2"): ?> 
<img src="<?php echo getGravatar($comment['mail']); ?>" width="40" height="40"  class="avatar avatar-40 wp-user-avatar wp-user-avatar-40 alignnone photo">
<?php endif; ?>
</div>
<div class="comment-meta">
<p class="comment-author comment-author">
<span itemprop="givenName">
<strong class="h-title"><?php echo $comment['poster']; ?></strong> <?php if ($useragent == "1"){?><?php if(function_exists('display_useragent')){display_useragent($comment['cid'],$comment['mail']);} ?><?php }; ?>
</span>
<span class="comt-f"><?php if ($i == 1){ echo "沙发<sup>#</sup>";}elseif ($i == 2){echo "板凳<sup>#</sup>";}elseif ($i == 3){ echo "地板<sup>#</sup>";}else{ echo $i.'<sup>楼</sup>';}?></span>
</p>
<time class="comment-published comment-time"><i class="fa  fa-calendar"></i> <?php echo $comment['date']; ?></time>
</div>
<div class="comment-content">
<div class="the-content"><p><?php echo $comment['content']; ?></p>
</div>
</div>
<a rel="nofollow" class="comment-reply-link" href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)"><i class="fa fa-reply"></i> 回复</a> </article>
		<?php blog_comments_children($comments, $comment['children']); ?>
	</li> 
</ol>
	<?php $i--;endforeach;?>
    <div class="pagination">
	    <?php echo $commentPageUrl;?>
    </div>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
	require(EMLOG_ROOT.'/content/templates/frontopen3/config.php');
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child):
	$comment = $comments[$child];
	$comment['poster'] = $comment['url'] ? '<a href="'.TEMPLATE_URL.'template/go.php?url='.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
<ul class="children">
<li id="comment-11" class="comment byuser comment-author-betterstudio bypostauthor odd alt depth-2">
<article class="comment">
<div class="comment-avatar">
<?php if ($xavatar == "1"): ?>
<?php avatar( $comment['mail'], $size = '40', $default = 'monsterid', $alt = 'gravatar' );?>
<?php elseif ($xavatar == "2"): ?> 
<img src="<?php echo getGravatar($comment['mail']); ?>" width="40" height="40"  class="avatar avatar-40 wp-user-avatar wp-user-avatar-40 alignnone photo">
<?php endif; ?> 
</div>
<div class="comment-meta">
<p class="comment-author comment-author">
<span><strong class="h-title"><?php echo $comment['poster']; ?></strong>  <?php if ($useragent == "1"){?><?php if(function_exists('display_useragent')){display_useragent($comment['cid'],$comment['mail']);} ?><?php }; ?>
</span>
</p>
<time class="comment-published comment-permalink comment-time">
<i class="fa  fa-calendar"></i> <?php echo $comment['date']; ?></time>
</a>
</div>
<div class="comment-content">
<div class="the-content">
<?php echo $comment['content']; ?>
</div>
</div>
<?php if($comment['level'] < 4): ?>
<a rel="nofollow" class="comment-reply-link" href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)"><i class="fa fa-reply"></i>  回复</a> <?php endif; ?></article>
</li> 
		<?php blog_comments_children($comments, $comment['children']);?>
	</ul> 
	<?php endforeach; ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
	<div id="comment-place">
    	<div class="comment-post" id="comment-post">
	<div id="respond" class="comment-respond">
<h3 id="reply-title" class="comment-reply-title"></h3>
<h4 class="section-heading "><span class="h-title">大家讨论</span></h4> 
<small class="cancel-reply" id="cancel-reply" style="display:none"><a rel="nofollow" id="cancel-comment-reply-link" href="javascript:void(0);" onclick="cancelReply()" >取消回复</a></small>
		<form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom"  id="commentform" class="comment-form">
        <input type="hidden" name="gid" value="<?php echo $logid; ?>" />
        <?php if(ROLE == ROLE_VISITOR): ?>
        <p><input name="comname" id="author" type="text" value="<?php echo $ckname; ?>" size="45" aria-required="true" placeholder="昵称"></p>
<p><input name="commail" id="email" type="text" value="<?php echo $ckmail; ?>" size="45" aria-required="true" placeholder="邮件地址 (选填)"></p>
<p><input name="comurl" id="url" type="text" value="<?php echo $ckurl; ?>" size="45" placeholder="个人主页 (选填)"></p>
<?php endif; ?>
			<p><textarea  name="comment" id="comment" cols="45" rows="10" aria-required="true" placeholder="内容"></textarea></p>
			<p> <?php echo $verifyCode; ?></p>
<p class="form-submit"><input name="submit" type="submit" id="comment-submit" class="submit" value="发表评论"> 
<input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
</p>
</form>
</div> 
</div> 
</div>
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
//获取微语
function get_newtwLI($n=3){
  global $CACHE;
  $tw = $CACHE->readCache('newtw');
  $a=1; $li = "";
  foreach($tw as $v){ $li .= "<li><a class=\"limit-line ellipsis\">". $v['t'] ."</a></li>"; }
  return $li;
}
?>
<?php
//获取随机
function rand_log() {
    $db = MySql::getInstance();
    $sql = "SELECT gid FROM ".DB_PREFIX."blog WHERE type='blog' and hide='n' ORDER BY rand() LIMIT 0,1";
    $list = $db->query($sql);
    while($row = $db->fetch_array($list)){
        echo Url::log($row['gid']);
    }
}
?>
<?php
//去掉列表空格下一行和截取数
function handlearticledes($des) {
$str = preg_replace("/(<\/?)(\w+)([^>]*>)/e",'',$des);
$str = preg_replace("/阅读全文&gt;&gt;/",'',$str);
$str = strip_tags($str,""); 
$str = ereg_replace("\t","",$str); 
$str = ereg_replace("\r\n","",$str); 
$str = ereg_replace("\r","",$str); 
$str = ereg_replace("\n","",$str); 
$str = ereg_replace(" "," ",$str); 
return mb_substr($str,0,140,'utf8').'...';
}
?>
<?php
function unCompress($content){
    if(preg_match_all('/(crayon-|<\/pre>)/i', $content, $matches)) {
        $content = '<!--em-compress-html--><!--em-compress-html no compression-->'.$content;
        $content.= '<!--em-compress-html no compression--><!--em-compress-html-->';
    }
    return $content;
}
unCompress($log_content);
function em_compress_html_main($buffer){
    $initial=strlen($buffer);
    $buffer=explode("<!--em-compress-html-->", $buffer);
    $count=count ($buffer);
    for ($i = 0; $i <= $count; $i++){
        if (stristr($buffer[$i], '<!--em-compress-html no compression-->')){
            $buffer[$i]=(str_replace("<!--em-compress-html no compression-->", " ", $buffer[$i]));
        }else{
            $buffer[$i]=(str_replace("\t", " ", $buffer[$i]));
            $buffer[$i]=(str_replace("\n\n", "\n", $buffer[$i]));
            $buffer[$i]=(str_replace("\n", "", $buffer[$i]));
            $buffer[$i]=(str_replace("\r", "", $buffer[$i]));
            while (stristr($buffer[$i], '  '))
            {
            $buffer[$i]=(str_replace("  ", " ", $buffer[$i]));
            }
        }
        $buffer_out.=$buffer[$i];
    }
    $final=strlen($buffer_out);
    $savings=($initial-$final)/$initial*100;
    $savings=round($savings, 2);
    $buffer_out.="\n<!--压缩前的大小: $initial bytes; 压缩后的大小: $final bytes; 节约：$savings% -->";
    return $buffer_out;
}
?>
<?php
//获取时间
function timeago($unixtime) {
	$etime = time() - $unixtime;
    if ($etime < 1) return '刚刚';     
    $interval = array (         
        12 * 30 * 24 * 60 * 60  =>  '年前 ('.date('Y-m-d', $unixtime).')',
        30 * 24 * 60 * 60       =>  '个月前 ('.date('m-d', $unixtime).')',
        7 * 24 * 60 * 60        =>  '周前 ('.date('m-d', $unixtime).')',
        24 * 60 * 60            =>  '天前',
        60 * 60                 =>  '小时前',
        60                      =>  '分钟前',
        1                       =>  '秒前'
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}
?>
<?php 
//头像缓存
function avatar($email,$size = '32',$default = '',$alt = 'gravatar'){
  $f = md5(strtolower($email));
  $w = BLOG_URL;
  $a = $w.'avatar/'.$f.'.jpg';
  $e = EMLOG_ROOT .'/avatar/'.$f.'.jpg';
  $t = 1209600; //设定14天
  if (empty($default)) $default = $w. '/avatar/default.jpg';
  if (!is_file($e) || (time() - filemtime($e)) > $t ){ //当头像不存在或者超过14天才更新
    $r = 'X';
    $g = sprintf( "http://%d.gravatar.com", ( hexdec( $f{0} ) % 2 ) ). '/avatar/'. $f. '?s=64&d='. $default. '&r='. $r;
    copy($g, $e); $a = $g; //新头像 copy 时, 取 gravatar 显示
  }
  if (filesize($e) < 500) copy($default, $e);
  echo "<img title='{$alt}' alt='{$alt}' src='{$a}' class='gravatar' height='{$size}' width='{$size}' class='avatar avatar-40 wp-user-avatar wp-user-avatar-40 alignnone photo'/>";
}
?>
<?php
function log_comment($logid, $num = "1"){
        $DB = MySql::getInstance();
        $sql = "SELECT cid,gid,date,poster,mail,comment FROM " . DB_PREFIX . "comment WHERE hide='n' and gid=$logid and pid= 0 ORDER BY date DESC LIMIT 0, $num";
	    $log_comm = array();
        $query = $DB->query($sql);
		while($row = $DB->fetch_array($query)){
				$row['name'] = htmlspecialchars($row['poster']);	
				$log_comm[] = $row;
		}
		if(!empty($log_comm)){
			foreach($log_comm as $value){
				$comment_url = Url::comment($value['gid'], $value['page'], $value['cid']);
				echo '
		<a href="'.$comment_url.'" class="bbp-author-name" rel="nofollow">'.$value['name'].'</a> - <span class="freshness">'.gmdate('Y-m-d', $value['date'] + $timezone * 3600).'</span>';
			}
		}
}
?>  
<?php
//统计文章总数
function count_log_all(){
$db = MySql::getInstance();
$data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog WHERE type = 'blog'");
return $data['total'];
}
//统计页面总数
function count_page_all(){
$db = MySql::getInstance();
$data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog WHERE type = 'page'");
return $data['total'];
}
//统计评论总数
function count_com_all(){
$db = MySql::getInstance();
$data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "comment");
return $data['total'];
}
//统计友链总数
function count_link_all(){
$db = MySql::getInstance();
$data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "link");
return $data['total'];
}
//统计分类总数
function count_sort_all(){
$db = MySql::getInstance();
$data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sort");
return $data['total'];
}
//统计标签总数
function count_tag_all(){
$db = MySql::getInstance();
$data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tag");
return $data['total'];
}
//统计微语总数
function count_tw_all(){
$db = MySql::getInstance();
$data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "twitter");
return $data['total'];
}
//统计用户总数
function count_user_all(){
$db = MySql::getInstance();
$data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "user");
return $data['total'];
}
//统计管理员总数
function count_user_admin(){
$db = MySql::getInstance();
$data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "user WHERE role = 'admin'");
return $data['total'];
}
//最后发表文章时间 
function last_post_log(){
$db = MySql::getInstance();
$sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE type='blog' ORDER BY date DESC LIMIT 0,1";
$res = $db->query($sql);
$row = $db->fetch_array($res);
$date = date('Y-n-j H:i',$row['date']);
return $date; 
};
?>
<?php
function log_comments($logid, $num = "1"){
        $DB = MySql::getInstance();
        $sql = "SELECT cid,gid,date,poster,mail,comment FROM " . DB_PREFIX . "comment WHERE hide='n' and gid=$logid and pid= 0 ORDER BY date DESC LIMIT 0, $num";
	    $log_comm = array();
        $query = $DB->query($sql);
		while($row = $DB->fetch_array($query)){
				$row['name'] = htmlspecialchars($row['poster']);	
				$log_comm[] = $row;
		}
		if(!empty($log_comm)){
			foreach($log_comm as $value){
				$avatar_url = function_exists('avatar_cache_cdn') ? avatar_cache_cdn($value['mail'],32) : getGravatar($value['mail'],32);
				$comment_url = Url::comment($value['gid'], $value['page'], $value['cid']);
				echo '<a href="'.$comment_url.'"  class="bbp-author-avatar" rel="nofollow"><img width="35" height="35"  class="avatar avatar-35 wp-user-avatar wp-user-avatar-35 alignnone photo" src="'.$avatar_url.'" alt="'.$value['mail'].'"></a>';
			}
		}
}
?>
<?php 
?>
<?php
function customy(){
	$log_content =  ob_get_clean();
	$log_content = preg_replace_callback("|\<cy>(.*?)\</cy>|is",'customery',$log_content);
	if(Option::get('isgzipenable') == 'y' && function_exists('ob_gzhandler')){ob_start('ob_gzhandler');}else{ob_start();}
	echo $log_content;	
}
function customery($match){
	require(EMLOG_ROOT.'/content/templates/frontopen3/config.php');
	$content = $match[1];
	return "<script type=\"text/javascript\">
    var flashvars={
        f:'".customy."=".$content."',
        c:0,
        loaded:'loadedHandler'
    };
    var video=['".customy."=".$content." ->video/mp4'];
    CKobject.embed('".TEMPLATE_URL."js/ckplayer.swf','a1','ckplayer_a1','99%','99%',false,flashvars,video);
</script>";
}
addAction('index_footer','customy');
?>
<?php
function customq(){
	$log_content =  ob_get_clean();
	$log_content = preg_replace_callback("|\<cq>(.*?)\</cq>|is",'customerq',$log_content);
	if(Option::get('isgzipenable') == 'y' && function_exists('ob_gzhandler')){ob_start('ob_gzhandler');}else{ob_start();}
	echo $log_content;	
}
function customerq($match){
	require(EMLOG_ROOT.'/content/templates/frontopen3/config.php');
	$content = $match[1];
	return "<script type=\"text/javascript\">
    var flashvars={
        f:'".customq."=".$content."',
        c:0,
        loaded:'loadedHandler'
    };
    var video=['".customq."=".$content." ->video/mp4'];
    CKobject.embed('".TEMPLATE_URL."js/ckplayer.swf','a1','ckplayer_a1','99%','99%',false,flashvars,video);
</script>";
}
addAction('index_footer','customq');
?>
<?php
function customf(){
	$log_content =  ob_get_clean();
	$log_content = preg_replace_callback("|\<cf>(.*?)\</cf>|is",'customerf',$log_content);
	if(Option::get('isgzipenable') == 'y' && function_exists('ob_gzhandler')){ob_start('ob_gzhandler');}else{ob_start();}
	echo $log_content;	
}
function customerf($match){
	require(EMLOG_ROOT.'/content/templates/frontopen3/config.php');
	$content = $match[1];
	return "<script type=\"text/javascript\">
    var flashvars={
        f:'".customf."=".$content."',
        c:0,
        loaded:'loadedHandler'
    };
    var video=['".customf."=".$content." ->video/mp4'];
    CKobject.embed('".TEMPLATE_URL."js/ckplayer.swf','a1','ckplayer_a1','99%','99%',false,flashvars,video);
</script>";
}
addAction('index_footer','customf');
?>
<?php
function customt(){
	$log_content =  ob_get_clean();
	$log_content = preg_replace_callback("|\<ct>(.*?)\</ct>|is",'customert',$log_content);
	if(Option::get('isgzipenable') == 'y' && function_exists('ob_gzhandler')){ob_start('ob_gzhandler');}else{ob_start();}
	echo $log_content;	
}
function customert($match){
	require(EMLOG_ROOT.'/content/templates/frontopen3/config.php');
	$content = $match[1];
	return "<script type=\"text/javascript\">
    var flashvars={
        f:'".customt."=".$content."',
        c:0,
        loaded:'loadedHandler'
    };
    var video=['".customt."=".$content." ->video/mp4'];
    CKobject.embed('".TEMPLATE_URL."js/ckplayer.swf','a1','ckplayer_a1','99%','99%',false,flashvars,video);
</script>";
}
addAction('index_footer','customt');
?>
<?php
function ytbvideo(){
	$log_content =  ob_get_clean();
	$log_content = preg_replace_callback("|\<ytb>(.*?)\</ytb>|is",'ytbplayer',$log_content);
	if(Option::get('isgzipenable') == 'y' && function_exists('ob_gzhandler')){ob_start('ob_gzhandler');}else{ob_start();}
	echo $log_content;	
}
function ytbplayer($match){
	    $content = $match[1];
		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,''.TEMPLATE_URL.'api/ytb.php?id='.$content.'');
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:8.8.8.8', 'CLIENT-IP:8.8.8.8')); 
        curl_setopt($curl, CURLOPT_REFERER, "http://www.baidu.com/");
        curl_setopt($curl, CURLOPT_HEADER, 0); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
        $data = curl_exec($curl); 
        curl_close($curl); 
	    return "
	    <script type=\"text/javascript\">
        var flashvars={
        f:'".$data."',
        c:0,
        loaded:'loadedHandler'
        };
        var video=['".$data." ->video/mp4'];
        CKobject.embed('".TEMPLATE_URL."js/ckplayer.swf','a1','ckplayer_a1','99%','99%',false,flashvars,video);
        </script>";
       }
addAction('index_footer','ytbvideo');
?>
<?php
function qqvideo(){
	$log_content =  ob_get_clean();
	$log_content = preg_replace_callback("|\<qq>(.*?)\</qq>|is",'qqckplayer',$log_content);
	if(Option::get('isgzipenable') == 'y' && function_exists('ob_gzhandler')){ob_start('ob_gzhandler');}else{ob_start();}
	echo $log_content;	
}
function qqckplayer($match){
	$content = $match[1];
	return "<script type=\"text/javascript\">
    var flashvars={
        f:'".TEMPLATE_URL."api/qq.php?vid=".$content."',
        c:0,
        loaded:'loadedHandler'
    };
    var video=['".TEMPLATE_URL."api/qq.php?vid=".$content." ->video/mp4'];
    CKobject.embed('".TEMPLATE_URL."js/ckplayer.swf','a1','ckplayer_a1','99%','99%',false,flashvars,video);
</script>";
}
addAction('index_footer','qqvideo');
?>
<?php
function video(){
	$log_content =  ob_get_clean();
	$log_content = preg_replace_callback("|\<v>(.*?)\</v>|is",'ckplayer',$log_content);
	if(Option::get('isgzipenable') == 'y' && function_exists('ob_gzhandler')){ob_start('ob_gzhandler');}else{ob_start();}
	echo $log_content;	
}
function ckplayer($match){
	$content = $match[1];
	return "<script type=\"text/javascript\">
    var flashvars={
        f:'".TEMPLATE_URL."api/vlook.php?vid=".$content."',
        c:0,
        loaded:'loadedHandler'
    };
    var video=['".TEMPLATE_URL."api/vlook.php?vid=".$content." ->video/mp4'];
    CKobject.embed('".TEMPLATE_URL."js/ckplayer.swf','a1','ckplayer_a1','99%','99%',false,flashvars,video);
</script>";
}
addAction('index_footer','video');
?>
<?php
function ykvideo(){
	$log_content =  ob_get_clean();
	$log_content = preg_replace_callback("|\<yk>(.*?)\</yk>|is",'ykplayer',$log_content);
	if(Option::get('isgzipenable') == 'y' && function_exists('ob_gzhandler')){ob_start('ob_gzhandler');}else{ob_start();}
	echo $log_content;	
}
function ykplayer($match){
	$content = $match[1];
		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,''.TEMPLATE_URL.'api/yk.php?vid='.$content.'');
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:8.8.8.8', 'CLIENT-IP:8.8.8.8')); 
        curl_setopt($curl, CURLOPT_REFERER, "http://www.baidu.com/");
        curl_setopt($curl, CURLOPT_HEADER, 0); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
        $data = curl_exec($curl); 
        curl_close($curl); 
	$yk = '<embed width="100%" height="70" align="middle" type="application/x-shockwave-flash" allowscriptaccess="always" quality="high" allowfullscreen="true" src="'.$data.'">';
       return $yk; 

}
addAction('index_footer','ykvideo');
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
function pic_thumb($content){
    preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $content, $img);
    $imgsrc = !empty($img[1]) ? $img[1][0] : '';
    if($imgsrc):
        return $imgsrc;
    endif;
}
?>
<?php 
function video_Top_Logs() {
    $db = MySql::getInstance();
    $sql =     "SELECT gid,title,content,date,views FROM ".DB_PREFIX."blog WHERE type='blog' and top='y' or sortop='y' ORDER BY `top` DESC ,`date` DESC LIMIT 0,4";
    $list = $db->query($sql);
    while($value = $db->fetch_array($list)){
       $search_pattern = '%<img[^>]*?src=[\'\"]((?:(?!\/admin\/|>).)+?)[\'\"][^>]*?>%s';
			preg_match($search_pattern, $value['content'],$match);
			$img_src = getThumbnail($value['gid']);
$imgsrc = !empty($match[1]) ? $match[1][0] : '';
if($img_src){ 
$thum_src= $img_src;
}elseif($imgsrc){ 
$thum_src =$imgsrc;
}else{
$thum_src = isset($match[0][0]) ? $match[0][0] : ''.TEMPLATE_URL.'img/rand/'.rand(1,4).'.jpg';
}
        echo "<li class=\"post-".$value['gid']." type-post status-publish format-standard has-post-thumbnail  clearfix main-term-12\">
<a class=\"post-thumbnail\"  href=\"".Url::log($value['gid'])."\">
<img width=\"90\" height=\"60\" src=".$thum_src." class=\"attachment-post-thumbnail wp-post-image\" >
</a>
<h3 class=\"title\">
<a class=\"post-url\" rel=\"bookmark\" href=\"".Url::log($value['gid'])."\" title=".$value['title'].">
<span class=\"post-title\" >".$value['title']."</span>
</a>
</h3>
<div class=\"post-meta meta\">
<span class=\"time\"><i class=\"fa fa-clock-o\"></i> <time class=\"post-published updated\">
".timeago($value['date'])."</time>
<span class=\"views\" ><i class=\"fa fa-eye\"></i>".$value['views']."</span>
</span>
</div>
</li>";
    }
}
?>
<?php
	function related_logs($logData = array())
	{
	    $related_log_type = 'sort';
	    $related_log_sort = 'rand';
	    $related_log_num = '3';
	    $related_inrss = 'y';
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
	    $sql = "SELECT gid,title,date,views FROM ".DB_PREFIX."blog WHERE hide='n' AND type='blog'";
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
				$search_pattern = '%<img[^>]*?src=[\'\"]((?:(?!\/admin\/|>).)+?)[\'\"][^>]*?>%s';
			preg_match($search_pattern, $val['content'],$match);
			$img_src = getThumbnail($val['gid']);
$imgsrc = !empty($match[1]) ? $match[1][0] : '';
if($img_src){ 
$thum_src= $img_src;
}elseif($imgsrc){ 
$thum_src =$imgsrc;
}else{
$thum_src = isset($match[0][0]) ? $match[0][0] : ''.TEMPLATE_URL.'img/rand/'.rand(1,4).'.jpg';
};
$out .= "<div class=\"col-lg-4 col-md-4 col-sm-6 col-xs-12 related-post-item\">
				<article class=\"post-".$val['gid']." type-post status-publish format-standard has-post-thumbnail  block-modern main-term-12\">
				<a class=\"post-thumbnail image-link\" href=\"".Url::log($val['gid'])."\">
				<img width=\"360\" height=\"200\" src=\"{$thum_src}\" data-original=\"{TEMPLATE_URL}img/loading.gif\" class=\"img-responsive wp-post-image\" >
				</a>
				<div class=\"post-meta meta\">
				<span class=\"time\"><i class=\"fa fa-clock-o\"></i> <time class=\"post-published updated\">".timeago($val['date'])."</time></span>
				<span class=\"views\" ><i class=\"fa fa-eye\"></i>{$val['views']}</span>
				</div>
				
<h2 class=\"title highlight-line\"><a class=\"post-url\"  rel=\"bookmark\" href=\"".Url::log($val['gid'])."\">
<span class=\"post-title\" >{$val['title']}</span></a></h2>
</article>
</div> 
";
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
<?php //cms顶置
function new_ding(){
$db = MySql::getInstance();
$sql = "SELECT date,gid,title,content,views FROM ".DB_PREFIX."blog WHERE type='blog' and top='y' or sortop ='y'  order by rand()   DESC LIMIT 0, 4";
$imgs = $db->query($sql);
while($row = $db->fetch_array($imgs)){
preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['content'], $img);
$logpost = !empty($row['excerpt']) ? $row['excerpt'] : '' . $row['content'] . '';
$content = strip_tags($logpost, '');
$content = handlearticledes($content);
$img_src = getThumbnail($row['gid']);
$imgsrc = !empty($img[1]) ? $img[1][0] : '';
if($img_src){ 
$thum_src='<img src="'.$img_src.'" data-original="'.TEMPLATE_URL.'img/loading.gif" class="attachment-post-thumbnail wp-post-image" width="90" height="60" >';
}elseif($imgsrc){ 
$thum_src ='<img src="'.$imgsrc.'" data-original="'.TEMPLATE_URL.'img/loading.gif" class="attachment-post-thumbnail wp-post-image" width="90" height="60">';
}else{
$thum_src = isset($match[0][0]) ? $match[0][0] : '<img src="'.TEMPLATE_URL.'images/random/'.rand(1,3).'.jpg"  data-original="'.TEMPLATE_URL.'img/loading.gif" class="attachment-post-thumbnail wp-post-image" width="90" height="60">';
}
$out .= '
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<ol class="listing-thumbnail">
<li class="post-'.$row['gid'].' type-post status-publish format-standard has-post-thumbnail last-item clearfix main-term-9" >
<a class="post-thumbnail" href="'.Url::log($row['gid']).'">'.$thum_src.'</a>
<h3 class="title">
<a class="post-url"  rel="bookmark" href="'.Url::log($row['gid']).'" title="'.$row['title'].'"><span class="post-title">'.$row['title'].'</span>
</a>
</h3>
<div class="post-meta meta ">
<span class="time"><i class="fa fa-clock-o"></i> <time class="post-published updated">'.timeago($row['date']).'</time></span>
<span class="views" itemprop="interactionCount"><i class="fa fa-eye"></i>'.$row['views'].'</span>
</div> 
</li>
</ol>
</div>
';
}
echo $out;
}
?>
<?php //cms顶置
function home_newlog()   {
        $db = MySql::getInstance();
        $sql = $db->query('SELECT * FROM ' . DB_PREFIX . 'blog inner join ' . DB_PREFIX . "sort WHERE hide='n' AND type='blog' AND top='n' AND sortid=sid order by date DESC limit 0, 4");
        while ($row = $db->fetch_array($sql)) {
			global $CACHE;
$user_cache = $CACHE->readCache('user');
$name = $user_cache[$row['author']]['mail'] != '' ? "<a href=\"mailto:".$user_cache[$row['author']]['mail']."\" id=\"names\">".$user_cache[$row['author']]['name']."</a>" : $user_cache[$row['author']]['name'];
            $logpost = !empty($row['excerpt']) ? $row['excerpt'] : ''.$row['content'].'';
            preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['content'], $match);
			$img_src = getThumbnail($row['gid']);
$imgsrc = !empty($match[1]) ? $match[1][0] : '';
if($img_src){ 
$thum_src='<img src='.$img_src.' data-original="'.TEMPLATE_URL.'img/loading.gif"  width="360" height="200" class="img-responsive wp-post-image" >';
}elseif($imgsrc){ 
$thum_src ='<img "src='.$imgsrc.' data-original="'.TEMPLATE_URL.'img/loading.gif" width="360" height="200" class="img-responsive wp-post-image" >';
}else{
$thum_src = isset($match[0][0]) ? $match[0][0] : '<img src='.TEMPLATE_URL.'images/random/'.rand(1,3).'.jpg data-original="'.TEMPLATE_URL.'img/loading.gif" width="360" height="200" class="img-responsive wp-post-image">';
}
            $date = timeago($row['date']);
            $content = strip_tags($logpost, '');
            $content = mb_substr($content, 0, 190, 'utf-8');
            $comment = $row['comnum'] != 0 ? '评论：(' . $row['comnum'] . ')' : '暂无评论';
            $gid = $row['gid'];
            $tag = $db->query('SELECT * FROM ' . DB_PREFIX . "tag WHERE gid LIKE '%,{$gid},%'");
            $out .= '
			<li>
<article class="post-103 type-post status-publish format-gallery has-post-thumbnail  block-modern main-term-14" >
<a class="post-thumbnail image-link" href="' . Url::log($row['gid']) . '"">' . $thum_src  . '</a>
<span class="term-title term-14">
<a href="' . Url::sort($row['sortid']) . '">' . $row['sortname'] . '</a>
</span>
<div class="post-meta meta ">
<span class="time"><i class="fa fa-clock-o"></i> <time class="post-published updated" >' . $date . '</time></span>
<span class="views"><i class="fa fa-eye"></i>' . $row['views'] . '</span>
</div>
<h2 class="title highlight-line"><a class="post-url" rel="bookmark" href="' . Url::log($row['gid']) . '" title="' . $row['title'] . '"><span class="post-title">' . $row['title'] . '</span></a></h2>
</article>
</li>
';
}
		echo $out;	
	}
?>
<?php
function get_cms($sort){
	require(EMLOG_ROOT.'/content/templates/frontopen3/config.php');
			$db = MySql::getInstance();
			?>
			<?php
			$sql = "SELECT sortname FROM ".DB_PREFIX."sort WHERE sid=".$sort;
			$s = $db->query($sql);
			$sortname = $db->fetch_array($s);
			?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="section-heading extended clearfix  term-12">
<h4><span class="h-title"> <?php echo $sortname['sortname'];?></span></h4>
<ul class="other-links">
<li class="other-item listing-read-more "><a href="<?php echo Url::sort($sort);?>">更多...<i class="fa fa-chevron-right"></i></a></li>
</ul>
</div>
			<?php
			$sqlf = "SELECT gid,title,date,content FROM ".DB_PREFIX."blog WHERE sortid=".$sort." AND hide='n' ORDER BY `date` DESC LIMIT 0,1";
			$first = $db->query($sqlf);
			while($row = $db->fetch_array($first)){
			?>
			<?php			
$thum_pic = EMLOG_ROOT.'/thumpic/'.$row['gid'].'.jpg';
if (is_file($thum_pic)) {

    $thum_url = BLOG_URL.'thumpic/'.$row['gid'].'.jpg'; 
}else{
$sql = "SELECT `A`.`blogid` as `g`, `A`.`filepath`, `B`.`title` as `t`, `B`.`date` as `d`, `B`.`content` as `c` FROM ".DB_PREFIX."attachment `A` LEFT JOIN ".DB_PREFIX."blog `B` ON `A`.`blogid`=`B`.`gid` WHERE `B`.`hide`='n' AND (`A`.`filepath` LIKE '%jpg' OR `filepath` LIKE '%gif' OR `filepath` LIKE '%png') AND (`A`.`blogid`=".$row['gid'].") GROUP BY `A`.`blogid` ORDER BY `A`.`addtime` DESC LIMIT 0,1";
	$imgs = $db->query($sql);
    while($roww = $db->fetch_array($imgs)){
	 $thum_url=BLOG_URL.substr($roww['filepath'],3,strlen($roww['filepath']));	 
    }
    if (empty($thum_url)) {
srand((double)microtime()*1000000); 
$randval   =   rand(0,3); 
            $thum_url = BLOG_URL.'content/templates/frontopen3/img/rand/'.$randval.'.jpg';
        }
    }

	?>
<?php if ($cmsimg == "1"): ?>
  <article class="post-158 type-post status-publish format-standard has-post-thumbnail  block-modern main-term-12" >
<a class="post-thumbnail image-link"  href="<?php echo Url::log($row['gid']);?>">
<img width="360" height="200" src="<?php echo $thum_url;?>" data-original="<?php echo TEMPLATE_URL; ?>img/loading.gif"  class="img-responsive wp-post-image" >
</a>
<div class="post-meta meta ">
<span class="time"><i class="fa fa-clock-o"></i> <time class="post-published updated" ><?php echo timeago($row['date']);?></time></span>
</div>
<h2 class="title "><a class="post-url"  rel="bookmark" href="<?php echo Url::log($row['gid']);?>" title="H<?php echo $row['title'];?>"><span class="post-title" itemprop="headline"><?php echo $row['title'];?></span></a></h2>
<div class="post-summary summary highlight-line" itemprop="about"><p><?php echo subString(strip_tags($row['content']),0,120);?></p>
</div>
</article>
<?php else:?>
<?php endif;?>
<?php
}
?>
<ol class="listing-simple">
<?php				
			if ($cmsimg == "1"){
	
			$sql2 = "SELECT gid,title,date FROM ".DB_PREFIX."blog WHERE sortid=".$sort." AND hide='n' ORDER BY `date` DESC LIMIT 1,5";
}else{
			$sql2 = "SELECT gid,title,date FROM ".DB_PREFIX."blog WHERE sortid=".$sort." AND hide='n' ORDER BY `date` DESC LIMIT 0,5";

}
			$list = $db->query($sql2);
			while($row = $db->fetch_array($list)){
				?>
              <li class="post-175 type-post status-publish format-video has-post-thumbnail  clearfix">
<h3 class="title">
<a class="post-url" rel="bookmark" href="<?php echo Url::log($row['gid']);?>" title="<?php echo $row['title'];?>">
<span class="post-title" itemprop="headline"><?php echo $row['title'];?></span></a>
<time class="update"><?php echo gmdate('n月j日', $row['date']); ?></time></h3>
</li>
				<?php
				}
				?>
				</ol>
</div>
	<?php	}
?>
<?php //视频
function get_video($sort){
$db = MySql::getInstance();
?>
<?php
			$sql = "SELECT sortname FROM ".DB_PREFIX."sort WHERE sid=".$sort;
			$s = $db->query($sql);
			$sortname = $db->fetch_array($s);
?>
 <div class="section-heading extended clearfix  term-12">
<h4><span class="h-title "> <?php echo $sortname['sortname'];?></span></h4>
<ul class="other-links">
<li class="other-item listing-read-more "><a href="<?php echo Url::sort($sort);?>">更多...<i class="fa fa-chevron-right"></i></a></li>
</ul>
</div>
<div class="row">
<?php
$sqlf = "SELECT gid,title,date,views,content FROM ".DB_PREFIX."blog WHERE sortid=".$sort." AND hide='n' ORDER BY `date` DESC LIMIT 0,8";
			$first = $db->query($sqlf);
			while($row = $db->fetch_array($first)){
			?>
			<?php			
$thum_pic = EMLOG_ROOT.'/thumpic/'.$row['gid'].'.jpg';
if (is_file($thum_pic)) {
    $thum_url = BLOG_URL.'thumpic/'.$row['gid'].'.jpg'; 
}else{
$sql = "SELECT `A`.`blogid` as `g`, `A`.`filepath`, `B`.`title` as `t`, `B`.`date` as `d`, `B`.`content` as `c` FROM ".DB_PREFIX."attachment `A` LEFT JOIN ".DB_PREFIX."blog `B` ON `A`.`blogid`=`B`.`gid` WHERE `B`.`hide`='n' AND (`A`.`filepath` LIKE '%jpg' OR `filepath` LIKE '%gif' OR `filepath` LIKE '%png') AND (`A`.`blogid`=".$row['gid'].") GROUP BY `A`.`blogid` ORDER BY `A`.`addtime` DESC LIMIT 0,1";
	$imgs = $db->query($sql);
    while($roww = $db->fetch_array($imgs)){
	 $thum_url=BLOG_URL.substr($roww['filepath'],3,strlen($roww['filepath']));	 
    }
    if (empty($thum_url)) {
srand((double)microtime()*1000000); 
$randval   =   rand(0,3); 
            $thum_url = BLOG_URL.'content/templates/frontopen3/img/rand/'.$randval.'.jpg';
        }
    }
	?>
<div class="col-lg-3 col-md-3 col-sm-12">
<article class="post-175 type-post status-publish format-video has-post-thumbnail  block-highlight main-term-8">
<a class="post-thumbnail image-link" href="<?php echo Url::log($row['gid']);?>">
<img width="360" height="200" src="<?php echo $thum_url;?>" class="img-responsive wp-post-image">
<i class="fa fa-play-circle-o"></i>
</a>
<div class="content">
<h2 class="title">
<a class="post-url" rel="bookmark" href="<?php echo Url::log($row['gid']);?>" title="<?php echo $row['title'];?>">
<span class="post-title"><?php echo $row['title'];?></span></a></h2>
<div class="post-meta meta ">
<span class="time"><i class="fa fa-clock-o"></i> 
<time class="post-published updated" datetime="<?php echo timeago($row['date']);?>">
<?php echo timeago($row['date']);?></time></span>
<span class="views"><i class="fa fa-eye"></i><?php echo $row['views'];?></span>
</div>
</div>
</article>
</div>
<?php
}
?>
</div>
<?php	}
?>