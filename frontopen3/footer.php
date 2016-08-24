<?php 
/**
 * 页面底部信息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<footer id="footer-lower" class="footer-lower-wrapper">
<div class="container">
<div class="row">
<aside class="col-lg-6 col-md-6 col-sm-6 col-xs-12 lower-footer-aside lower-footer-aside-1">
<div id="text-2" class=" widget-havent-icon footer-lower-widget lower-left-column widget widget_text"> <div class="textwidget"><p>POWERED BY <a href="http://www.emlog.net" title="采用emlog系统">EMLOG</a> <span class="cop"> / COPYRIGHT © <a href="<?php echo BLOG_URL; ?>"><span id="official"><?php echo $blogname; ?></span></a></span></p>
</div>
</div>
</aside>
<span class="cop">
<aside class="col-lg-6 col-md-6 col-sm-6 col-xs-12 lower-footer-aside lower-footer-aside-2">
<div id="better-social-counter-4" class=" widget-havent-icon footer-lower-widget lower-right-column widget widget_better-social-counter"> <div class="better-studio-shortcode bsc-clearfix better-social-counter style-button  in-4-col">
<ul class="social-list bsc-clearfix"><li>Frontopen 3</li></ul>
</div>
</div>
</aside>
</span>
</div>
</div>
</footer><span class="back-top"><i class="fa fa-chevron-up"></i></span>
</div> 

<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/frontopen.js?ver=2.7.0'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var Frontopen_vars = {"text_navigation":"导航菜单","main_slider":{"animation":"fade","slideshowSpeed":"7000","animationSpeed":"600"}};
/* ]]> */
</script>
<?php
if ($compress_html == "1")
{
        $html=ob_get_contents();
        ob_get_clean();
        echo em_compress_html_main($html);
}
?>
<?php doAction('index_footer'); ?>
<script type="text/javascript">loading('100%',350)</script>
</body>
</html>
 