<?php 
/**
 * 侧边栏
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php if ($layout  != "3"): ?> 
<div class="wrapper-sticky" >
<aside id="sidebar-primary-sidebar" class="sidebar col-lg-4 col-md-4 col-sm-4 col-xs-12 main-sidebar vertical-left-line">
<?php if (blog_tool_ishome()): ?>
<?php if ($top == "1"){?> 
<div id="better-social-counter-5" class=" widget-havent-icon primary-sidebar-widget widget widget_better-social-counter">
<h4 class="section-heading"><span class="h-title">本站统计</span></h4> 
<div class="better-studio-shortcode bsc-clearfix better-social-counter style-modern colored in-4-col" max-width="358px">
<ul class="social-list bsc-clearfix">
<li class="social-item facebook">
<div class="item-link">
<i class="item-icon fa-file-text-o fa"></i>
<span class="item-count"><?php echo count_log_all(); ?></span>
<span class="item-title">文章</span>
</div>
</li>
<li class="social-item twitter">
<div class="item-link">
<i class="item-icon fa fa-coffee"></i>
<span class="item-count"><?php echo count_tw_all(); ?></span>
<span class="item-title">微语</span>
</div>
</li>
<li class="social-item dribbble">
<div class="item-link">
<i class="item-icon fa fa-tag"></i>
<span class="item-count"><?php echo count_tag_all(); ?></span>
<span class="item-title">标签</span>
</div>
</li>
<li class="social-item youtube">
<div class="item-link" >
<i class="item-icon fa fa-sitemap"></i><span class="item-count"><?php echo count_link_all(); ?></span><span class="item-title">友链</span>
</div>
</li>
<li class="social-item vimeo">
<div class="item-link" >
<i class="item-icon fa fa-file-o"></i>
<span class="item-count"><?php echo count_page_all(); ?></span>
<span class="item-title">页面</span>
</div>
</li>
<li class="social-item github">
<div class="item-link">
<i class="item-icon fa fa-bars"></i>
<span class="item-count"><?php echo count_sort_all(); ?></span>
<span class="item-title">分类</span>
</div>
</li>
<li class="social-item vk">
<div class="item-link">
<i class="item-icon fa fa-comment  "></i>
<span class="item-count"><?php echo count_com_all(); ?></span>
<span class="item-title">评论</span>
</a>
</li>
<li class="social-item pinterest">
<i class="item-icon fa fa-users"></i>
<span class="item-count"><?php echo count_user_all(); ?></span>
<span class="item-title">用户</span>
</li>
 </ul>
</div>
</div>
<?php }?>
<div id="bm-recent-tab-2" class=" widget-havent-icon primary-sidebar-widget widget widget_bm-recent-tab">
<div class="section-heading extended tab-heading  active-term-5 clearfix term-5">
<ul class="other-links nav nav-tabs">
<li class="other-item  have-icon  main-term  term-5 active">
<a href="#new" data-toggle="tab"><i class="fa fa-star"></i> 最新</a>
</li>
<li class="other-item  have-icon  term-recent ">
<a href="#hot" data-toggle="tab">
<i class="fa fa-fire"></i> 热门</a>
</li>
<li class="other-item  have-icon  term-popular ">
<a href="#rand" data-toggle="tab"><i class="fa fa-clock-o"></i> 随机</a></li>
</ul>
</div> 
<div class="bf-shortcode bm-recent-tab">
<div class="tab-content">
<div class="tab-pane  have-icon  main-term  active" id="new"> 
<ul>
<?php global $CACHE;$newLogs_cache = $CACHE->readCache('newlog');?>
<?php $i = 1;foreach($newLogs_cache as $value): ?>
<li><a href="<?php echo Url::log($value['gid']); ?>" class="title" title="<?php echo $value['title']; ?>" role="bookmark"><span class="li-icon li-icon-<?php echo $i; ?>"><?php echo $i; ?></span><?php echo $value['title']; ?></a>
</li>
<?php $i++;endforeach; ?>
</ul>	
</div>
<div class="tab-pane " id="hot">
<?php $index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>	
	<ul >
	<?php $i=1;foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><span class="li-icon li-icon-<?php echo $i; ?>"><?php echo $i; ?></span><?php echo $value['title']; ?></a>
</li>
<?php $i++;endforeach; ?>
</ul>
</div>
<div class="tab-pane " id="rand">
<?php $index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
<ul id="randlog">
	<?php $i=1;foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><span class="li-icon li-icon-<?php echo $i; ?>"><?php echo $i; ?></span><?php echo $value['title']; ?></a></li>
	<?php $i++;endforeach; ?>
	</ul>
</div>
</div>
</div>
</div>
<?php endif;?>
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
<div id="betterweather-inline-2" class=" widget-havent-icon primary-sidebar-widget widget widget_betterweather-inline">
</div> 
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/side.js'></script>
<?php if (blog_tool_ishome()): ?>
<?php if ($top == "2"){?> 
<div id="better-social-counter-5" class=" widget-havent-icon primary-sidebar-widget widget widget_better-social-counter">
<h4 class="section-heading"><span class="h-title">本站统计</span></h4> 
<div class="better-studio-shortcode bsc-clearfix better-social-counter style-modern colored in-4-col" max-width="358px">
<ul class="social-list bsc-clearfix">
<li class="social-item facebook">
<div class="item-link">
<i class="item-icon fa-file-text-o fa"></i>
<span class="item-count"><?php echo count_log_all(); ?></span>
<span class="item-title">文章</span>
</div>
</li>
<li class="social-item twitter">
<div class="item-link">
<i class="item-icon fa fa-coffee"></i>
<span class="item-count"><?php echo count_tw_all(); ?></span>
<span class="item-title">微语</span>
</div>
</li>
<li class="social-item dribbble">
<div class="item-link">
<i class="item-icon fa fa-tag"></i>
<span class="item-count"><?php echo count_tag_all(); ?></span>
<span class="item-title">标签</span>
</div>
</li>
<li class="social-item youtube">
<div class="item-link" >
<i class="item-icon fa fa-sitemap"></i><span class="item-count"><?php echo count_link_all(); ?></span><span class="item-title">友链</span>
</div>
</li>
<li class="social-item vimeo">
<div class="item-link" >
<i class="item-icon fa fa-file-o"></i>
<span class="item-count"><?php echo count_page_all(); ?></span>
<span class="item-title">页面</span>
</div>
</li>
<li class="social-item github">
<div class="item-link">
<i class="item-icon fa fa-bars"></i>
<span class="item-count"><?php echo count_sort_all(); ?></span>
<span class="item-title">分类</span>
</div>
</li>
<li class="social-item vk">
<div class="item-link">
<i class="item-icon fa fa-comment  "></i>
<span class="item-count"><?php echo count_com_all(); ?></span>
<span class="item-title">评论</span>
</a>
</li>
<li class="social-item pinterest">
<a href="#" class="item-link" target="_blank">
<i class="item-icon fa fa-users"></i>
<span class="item-count"><?php echo count_user_all(); ?></span>
<span class="item-title">用户</span>
</a>
</li>
 </ul>
</div>
</div>
<?php }?>
<?php endif;?>
</aside>
</div>
<?php else:?>
<div class="wrapper-sticky">
<aside id="sidebar-primary-sidebar" class="sidebar col-lg-4 col-md-4 col-sm-4 col-xs-12 main-sidebar vertical-left-line" role="complementary" aria-label="Main Sidebar Sidebar">
<?php if(blog_tool_ishome()){ ?>
<?php if(ROLE == 'admin' || ROLE == 'writer'): ?>
<div id="bbp_login_widget-2" class=" widget-havent-icon primary-sidebar-widget widget bbp_widget_login">
<h4 class="section-heading"><span class="h-title">用户信息</span></h4>
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
<a href="<?php echo BLOG_URL; ?>admin" target="_blank">管理</a>
<a href="<?php echo BLOG_URL; ?>admin/?action=logout">注 销</a>
</div>
</div>
<?php else:?>
<div id="bbp_login_widget-2" class=" widget-havent-icon primary-sidebar-widget widget bbp_widget_login">
<h4 class="section-heading"><span class="h-title">登录</span></h4>
<form method="post" name="f" action="<?php echo BLOG_URL; ?>admin/index.php?action=login" class="bbp-login-form">
<fieldset>
<legend>登入</legend>
<div class="bbp-username">
<label for="user_login">用户名: </label>
<input type="text" name="user" value="" size="20" id="user_login" tabindex="103">
</div>
<div class="bbp-password">
<label for="user_pass">密码: </label>
<input type="password" name="pw" value="" size="20" id="user_pass" tabindex="104">
</div>
<div class="bbp-remember-me">
<input type="checkbox" name="rememberme" value="forever" id="rememberme" tabindex="105">
<label for="rememberme">记住密码</label>
</div>
<div class="bbp-submit-wrapper">
<button type="submit" name="user-submit" id="user-submit" tabindex="106" class="button submit user-submit">登入</button>
<input type="hidden" name="user-cookie" value="1">
</div>
</fieldset>
</form>
</div>
<?php endif; ?>
<div id="bbp_stats_widget-2" class=" widget-havent-icon primary-sidebar-widget widget widget_display_stats"><h4 class="section-heading"><span class="h-title">论坛统计</span></h4>
<dl role="main">
<dt>注册</dt>
<dd>
<strong><?php echo count_user_all(); ?> 人</strong>
</dd>
<dt>板块</dt>
<dd>
<strong><?php echo count_sort_all(); ?> 个</strong>
</dd>
<dt>文章</dt>
<dd>
<strong><?php echo count_log_all(); ?> 篇</strong>
</dd>
<dt>评论</dt>
<dd>
<strong><?php echo count_com_all(); ?> 条</strong>
</dd>
<dt>标签</dt>
<dd>
<strong><?php echo count_tag_all(); ?> 个</strong>
</dd>
</dl>
<?php }?>
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
</div> 
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/side.js'></script>
</aside>
</div>
<?php endif; ?> 
<script type="text/javascript">loading('78%',350)</script>