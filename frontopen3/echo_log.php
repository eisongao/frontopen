<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php if ($layout == "0"): ?>
<?php include View::getView('template/echo_blog');?>
<?php elseif ($layout == "1"): ?>
<?php include View::getView('template/echo_blog');?>
<?php elseif ($layout == "2"): ?> 
<?php include View::getView('template/echo_gallery');?>
<?php elseif ($layout  == "3"): ?> 
<?php include View::getView('template/echo_forums');?>
<?php elseif ($layout == "4"): ?> 
<?php include View::getView('template/echo_cms');?>
<?php elseif ($layout == "5"): ?> 
<?php include View::getView('template/echo_video');?>
<?php endif; ?> 
<?php
 include View::getView('footer');
?>