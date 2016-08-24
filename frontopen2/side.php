<?php 
/**
 * 侧边栏
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<script type="text/javascript">loading('55%',<?php echo _g('speed'); ?>)</script>
<aside id="primary" class="side" role="complementary">
<ul class="xoxo">
<?php if ($dengru == "yes"): ?>
<?php if (blog_tool_ishome()) :?>
<?php if(ROLE == 'admin' || ROLE == 'writer'): ?>
<li id="frontloginblock-2" class="widget-container widget_login"><div class="front_login_box">
<div class="is_login">
<div class="user_info">
<?php global $CACHE;$user_cache = $CACHE->readCache('user');$name = $user_cache[UID]['name'];$user_cache[$author]['mail']; ?>
<p class="avatar">
<a href="<?php echo BLOG_URL; ?>admin/blogger.php"><?php if($user_cache[$author]['photo']['src']):?>
<?php if (!empty($user_cache[$author]['photo']['src'])): ?>
<img src="<?php echo BLOG_URL.$user_cache[$author]['photo']['src']; ?>" height="96" width="96" data-bd-imgshare-binded="1">
<?php endif; ?>
<?php else:?>
<img src="<?php echo getGravatar($user_cache[UID]['mail']); ?>"  height="96" width="96" data-bd-imgshare-binded="1">
<?php endif; ?>
</a>
</p>
<p>欢迎，<?php echo $name;?></p>
<p style="color:#999"><?php echo $name;?> [订阅者]</p>
<p><a class="iframe" href="<?php echo BLOG_URL; ?>admin/blogger.php" title="编辑个人资料" target="_blank">编辑个人资料</a></p>
</div>
<div class="link_tools">
<a href="<?php echo BLOG_URL; ?>admin" target="_blank"><i class="icon-cog"></i> 管理</a><div class="cls"></div></div>
<div class="last_read">
<p style="margin-bottom:10px;">
<i class="icon-time"></i> 您最近浏览过文章</p>
<ul class="viewed_posts"><?php
if(isset($_COOKIE['postermail']) && !empty($_COOKIE['postermail'])){
        $postermail = $_COOKIE['postermail'];
		$DB = MySql::getInstance();
        $sql = "SELECT b.gid,b.title,c.cid,c.poster,SUBSTRING(c.comment,1,25) AS comment FROM emlog_comment c LEFT JOIN emlog_blog b ON c.gid = b.gid WHERE c.mail='$postermail' AND c.hide='n' ORDER BY c.date DESC LIMIT 5";
        $query = $DB->query($sql);
        while($row = $DB->fetch_array($query)){
                $footprints[] = array(
                        'gid'=>$row['gid'],
                        'title'=>$row['title'],
                        'cid'=>$row['cid'],
                        'poster'=>htmlspecialchars($row['poster']),
                        'comment'=>htmlClean($row['comment']),
     );
        }
$outputs = '';
foreach((array)$footprints as $footprint){
                $url = Url::log($footprint['gid']).'#'.$footprint['cid'];
                $outputs .= "<li><a href='$url' class='st'>{$footprint['title']}</a></li>";
        }
}
?><?php echo $outputs;?></ul>
</div>
<p class="logout"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">注 销</a></p><div class="cls"></div></div></div></li><?php else:?><li id="frontloginblock-2" class="widget-container widget_login"><div class="front_login_box"><div class="from_box"><form name="f" id="loginform" action="<?php echo BLOG_URL; ?>admin/index.php?action=login" method="post"><p class="p1"><span><i class="icon-user icon-2x"></i></span><input onfocus="this.value = '';" name="user" id="user" type="text" class="user_name" value="User Name"></p><p class="p1" style="margin-bottom:30px;"><span><i class="icon-lock icon-2x"></i></span><input onfocus="this.value = '';this.type = 'password';" name="pw" id="pw" type="text" class="password" value="Your Password"></p><p class="p2"><input name="提交" type="submit" class="submit_button" value="登 录"></p><p class="p3"><?php if ($reg == "yes"): ?><span style="float:right"><i class="icon-signin"></i> <a href="<?php echo BLOG_URL; ?>?plugin=yls_reg">注册</a></span><?php else:?><span style="float:right"><i class="icon-signin"></i> <a href="http://wiki.emlog.net/doku.php?id=chpwd" target="_blank">忘记密码?</a></span><?php endif; ?><span class="keep_me"><label  for="rememberme"><input type="checkbox" name="ispersis" id="ispersis" value="1" /></label> 记住我的登录信息</span></p> <input type="hidden" name="redirect_to" value="http://flyercn.com/"></form></div>
</div></li>
<?php endif; ?>
<?php endif; ?>
<?php else:?>
<?php endif; ?>
<?php echo _g('guanggao'); ?>
<?php 
$widgets = !empty($options_cache['widgets1']) ? unserialize($options_cache['widgets1']) : array();
doAction('diff_side');
foreach ($widgets as $val)
{
	$widget_title = @unserialize($options_cache['widget_title']);
	$custom_widget = @unserialize($options_cache['custom_widget']);
	if(strpos($val, 'custom_wg_') === 0)
	{
		$callback = 'widget_custom_text';
		if(function_exists($callback))
		{
			call_user_func($callback, htmlspecialchars($custom_widget[$val]['title']), $custom_widget[$val]['content']);
		}
	}else{
		$callback = 'widget_'.$val;
		if(function_exists($callback))
		{
			preg_match("/^.*\s\((.*)\)/", $widget_title[$val], $matchs);
			$wgTitle = isset($matchs[1]) ? $matchs[1] : $widget_title[$val];
			call_user_func($callback, htmlspecialchars($wgTitle));
		}
	}
}
?>
<li id="siteinfowidget" class="widget-container widget_links"><h3 class="widget-title">站点统计</h3> <?php $sta_cache = Cache::getInstance()->readCache('sta');?><ul class="xoxo siteInfo"><li>文章总数：<?php echo $sta_cache['lognum']; ?>篇</li><li>微语总数：<?php echo $sta_cache['twnum']; ?>条</li><li>评论总数：<?php echo $sta_cache['comnum']; ?>条</li><li>网站运行：<?php echo floor((time()-strtotime(_g('opentime')))/86400); ?>天</li></ul></li><li id="text-5" class="widget-container widget_text" ><div class="textwidget"></div></li></ul></aside> <script type="text/javascript">loading('78%',<?php echo _g('speed'); ?>)</script><div class="cls"></div></section>