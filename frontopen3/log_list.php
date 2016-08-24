<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<script type="text/javascript">loading('55%',350)</script>
<?php include View::getView('template/slider'); ?> 
<?php if ($layout == "0"): ?>
<?php include View::getView('template/default');?>
<?php elseif ($layout == "1"): ?>
<?php include View::getView('template/blog');?>
<?php elseif ($layout == "2"): ?> 
<?php include View::getView('template/gallery');?>
<?php elseif ($layout  == "3"): ?> 
<?php include View::getView('template/forums');?>
<?php elseif ($layout == "4"): ?> 
<?php include View::getView('template/cms');?>
<?php elseif ($layout == "5"): ?> 
<?php include View::getView('template/video');?>
<?php endif; ?> 
<?php
include View::getView('footer');
?>