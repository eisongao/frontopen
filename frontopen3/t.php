<?php 
/**
 * 微语部分
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="bf-breadcrumb-wrapper boxed">
<div class="container bf-breadcrumb-container">
<div class="bf-breadcrumb breadcrumbs bf-clearfix">
<span class="trail-begin"><a href="<?php echo BLOG_URL; ?>" rel="home"><i class="fa fa-home"></i> 首页</a></span>
<span class="sep"><i class="fa fa-angle-double-right"></i></span> <span class="trail-end">微语</span>
</div>
</div>
</div>
<main id="content" class="content-container container">
<div class="row main-section">
<div class="main-content col-lg-8 col-md-8 col-sm-8 col-xs-12 with-sidebar content-column" >
<article id="post" class="post type-post status-publish format-standard has-post-thumbnail category-bussinus category-entertainment category-miscellaneous single-content clearfix" >
<h1 class="post-title page-heading">
<span class="h-title">微语</span></h1>
<div class="archive-section clearfix">
<div class="column-9">
  <?php 
    foreach($tws as $val):
    $author = $user_cache[$val['author']]['name'];
    $avatar = empty($user_cache[$val['author']]['avatar']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$val['author']]['avatar'];
    $tid = (int)$val['id'];
    $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
    ?> 
<div class="ordered-list">
<h3><?php echo $val['date'];?></h3>
<ol>
<li><?php echo $val['t'].'<br/>'.$img;?></li> 
</ol>
</div>
<?php endforeach;?>
</div>
</div>
<div class="pagination">
<?php echo $pageurl;?>
</div>
</article>
</div>
<?php
 include View::getView('side');?>
</main>
<?php
 include View::getView('footer');
?>