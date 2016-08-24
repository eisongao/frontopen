<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="container">
<div id="content" role="main" style="width:96%">
<div class="mbx"><i class="icon-home icon-large" style="font-size:14px;"></i>&nbsp;<a href="<?php echo BLOG_URL; ?>" class="gray">首页</a> &gt; <?php echo $log_title; ?></div>
<div id="post">
<div class="c-top3" id="post"><h1 class="entry-title"><?php echo $log_title; ?></h1></div>
<article class="entry-content">
<?php echo $log_content; ?>
</article>
<div class="addcomment"><?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?></div>
<div class="comment-list clearfix"><?php blog_comments($comments,$comnum); ?></div>
</div>
</div>
</div>

<?php include View::getView('side'); include View::getView('footer');?>