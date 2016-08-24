<?php 
!defined('EMLOG_ROOT') && exit('access deined!');
require_once(EMLOG_ROOT.'/content/templates/frontopen3/config.php');
require_once('functions.php');
plugin_setting();
?>
<?php if(isset($_GET['do'])):?><span class="actived">保存成功</span><?php endif;?>
<?php if (ROLE == ROLE_ADMIN):?>
<link rel='stylesheet'href='<?php echo TEMPLATE_URL; ?>assets/css/admin.css?ver=1.2' type='text/css' media='screen' />
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>assets/js/jquery.tools.min.js?ver=1.2"></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>assets/js/admin.js?ver=1.2'></script>
<form action="?action=setting&do=save" method="post" id="input" class="da-form" enctype="multipart/form-data">
<div id="it_header">
<div clas="saves" style=" float:right; margin-top:11px">
<input type="submit" value="保 存" class="button" />
</div>
<div id="it_logo"><img src="<?php echo TEMPLATE_URL; ?>assets/images/logo.png" alt=""></div>
<div id="header_links"><span>Frontopen3 Beta 1</span>
</div>
</div>
<div id="TabMain">
	<div class="tabItemContainer">
		<li><a class="tabItemCurrent">常规设置</a></li>
		<li><a>幻灯片</a></li>
        	<li><a>公司</a></li>
                <li><a>论坛</a></li>
                <li><a>CMS</a></li>
                <li><a>视频</a></li>
                <li><a>广告</a></li>
                <li><a>辅助</a></li>
                <li><a>赞助</a></li>
	</div>
<div class="tabBodyContainer">
<div class="tabBodyItem tabBodyCurrent">
    <div class="it_option_set upload_option_set">
    <div class="it_option_header">上传你的LOGO</div>
    <div class="it_option">
   <form action="<?php echo TEMPLATE_URL; ?>assets/upload.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="javascript:return startupload();" >
     <span id="f1_upload_process"><img src="<?php echo TEMPLATE_URL; ?>img/logo.png" /></span>
     <span id="f1_upload_form" align="center">
       <input name="myfile" type="file" id="myfile" size="30" />   
       <input type="submit" name="submitbtn" class="sbtn" value="上传图片" />
        
     </span>
     
     <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>

</form>

    </div>
</div>
<div class="it_option_set radio_option_set">
            <div class="it_option_header">LOGO扫描效果</div>
            <div class="it_option">
            <input name="logo" type="radio" value="2" <?php if ($logo == "2") echo 'checked'?> ></input><label>默认</label>
            <input name="logo" type="radio"  value="1" <?php if ($logo == "1") echo 'checked'?>></input><label>扫描效果</label>
            </div>
 </div>
<div class="it_option_set radio_option_set">
            <div class="it_option_header">请选择模式</div>
            <div class="it_option">
            <input name="layout" type="radio" value="0" <?php if ($layout == "0") echo 'checked'?> ></input><label>企业</label>
            <input name="layout" type="radio" value="1" <?php if ($layout == "1") echo 'checked'?> ></input><label>博客</label>
            <input name="layout" type="radio"  value="2" <?php if ($layout == "2") echo 'checked'?>></input><label>图片</label>
            <input name="layout" type="radio" value="3" <?php if ($layout == "3") echo 'checked'?> ></input><label>论坛</label>
            <input name="layout" type="radio"  value="4" <?php if ($layout == "4") echo 'checked'?>></input><label>CMS</label>
            <input name="layout" type="radio"  value="5" <?php if ($layout == "5") echo 'checked'?>></input><label>视频</label>
            </div>
</div>
<div class="it_option_set radio_option_set">
            <div class="it_option_header">请选择样式</div>
            <div class="it_option">
            <input name="style" type="radio" value="0" <?php if ($style == "0") echo 'checked'?> ></input><label><span style="color:#999;">灰色</span></label>
            <input name="style" type="radio"  value="1" <?php if ($style == "1") echo 'checked'?> disabled="disabled" ></input><label><span style="color:#124EAE;">银色</span></label>
            <input name="style" type="radio" value="2" <?php if ($style == "2") echo 'checked'?>  disabled="disabled" ></input><label><span style="color:#FFAF60;">米色</span></label>
            <input name="style" type="radio"  value="3" <?php if ($style == "3") echo 'checked'?> disabled="disabled" ></input><label><span style="color:green;">绿色</span></label>
            <input name="style" type="radio" value="4" <?php if ($style == "4") echo 'checked'?> disabled="disabled" ></input><label><span style="color:#0080FF;">蓝色</span></label>
            <input name="style" type="radio"  value="5" <?php if ($style == "5") echo 'checked'?> disabled="disabled" ></input><label><span style="color:#66B3FF;">淡蓝</span></label>
            <input name="style" type="radio" value="6" <?php if ($style == "6") echo 'checked'?> disabled="disabled" ></input><label><span style="color:black;">黑色</span></label>
            <input name="style" type="radio"  value="7" <?php if ($style == "7") echo 'checked'?> disabled="disabled" ></input><label><span style="color:#272727;">小暗</span></label>
            <input name="style" type="radio"  value="8" <?php if ($style == "8") echo 'checked'?> disabled="disabled" ></input><label><span style="color:#5B5B5B;">深暗</span></label>
            </div>
</div>
<div class="it_option_set radio_option_set">
            <div class="it_option_header">顶部栏</div>
            <div class="it_option">
            <input name="topbar" type="radio" value="1" <?php if ($topbar == "1") echo 'checked'?> ></input><label><span style="color:#1963B4;">显示</span></label>
            <input name="topbar" type="radio"  value="2" <?php if ($topbar == "2") echo 'checked'?>></input><label><span style="color:#B42B19;">隐藏</span></label>
            </div>
</div> 
<div class="it_option_set radio_option_set">
            <div class="it_option_header">顶部左侧</div>
            <div class="it_option">
            <input name="welcome" type="radio" value="1" <?php if ($welcome == "1") echo 'checked'?> ></input><label><span style="color:#1963B4;">默认</span></label>
            <input name="welcome" type="radio"  value="2" <?php if ($welcome == "2") echo 'checked'?>></input><label><span style="color:#B42B19;">问候语</span></label>
            <input name="welcome" type="radio" value="3" <?php if ($welcome == "3") echo 'checked'?> ></input><label><span style="color:#B42B19;">隐藏</span></label>
            </div>
</div>    
<div class="it_option_set radio_option_set">
            <div class="it_option_header">顶部右侧按钮</div>
            <div class="it_option">
            <input name="social" type="radio" value="1" <?php if ($social == "1") echo 'checked'?> ></input><label><span style="color:#1963B4;">开启</span></label>
            <input name="social" type="radio"  value="2" <?php if ($social == "2") echo 'checked'?>></input><label><span style="color:#B42B19;">隐藏</span></label>
            </div>
</div> 
<div class="it_option_set radio_option_set">
            <div class="it_option_header">分类导航</div>
            <div class="it_option">
            <input name="fenlei" type="radio" value="1" <?php if ($fenlei == "1") echo 'checked'?> ></input><label><span style="color:#1963B4;">开启</span></label>
            <input name="fenlei" type="radio"  value="2" <?php if ($fenlei == "2") echo 'checked'?>></input><label><span style="color:#B42B19;">隐藏</span></label>
            </div>
</div> 
<div class="it_option_set radio_option_set">
            <div class="it_option_header">首页侧栏</div>
            <div class="it_option">
            <input name="sidebar" type="radio" value="1" <?php if ($sidebar == "1") echo 'checked'?> ></input><label><span style="color:#1963B4;">开启</span></label>
            <input name="sidebar" type="radio"  value="2" <?php if ($sidebar == "2") echo 'checked'?>></input><label><span style="color:#B42B19;">禁用</span></label>
            </div>
</div> 
<div class="it_option_set radio_option_set">
            <div class="it_option_header">列表缩略图</div>
            <div class="it_option">
            <input name="thm" type="radio" value="1" <?php if ($thm == "1") echo 'checked'?> ></input><label><span style="color:#1963B4;">开启</span></label>
            <input name="thm" type="radio"  value="2" <?php if ($thm == "2") echo 'checked'?>></input><label><span style="color:#B42B19;">隐藏</span></label>
            </div>
</div> 
<div class="it_option_set radio_option_set">
            <div class="it_option_header">视频模式</div>
            <div class="it_option">
            <input name="video" type="radio" value="1" <?php if ($video == "1") echo 'checked'?> ></input><label><span style="color:#1963B4;">开启</span></label>
            <input name="video" type="radio"  value="2" <?php if ($video == "2") echo 'checked'?>></input><label><span style="color:#B42B19;">禁用</span></label>
            </div>
</div> 
<div class="it_option_set radio_option_set">
            <div class="it_option_header">侧栏博客统计</div>
            <div class="it_option">
            <input name="top" type="radio" value="1" <?php if ($top == "1") echo 'checked'?> ></input><label><span style="color:#1963B4;">顶部</span></label>
            <input name="top" type="radio"  value="2" <?php if ($top == "2") echo 'checked'?>></input><label><span style="color:#B42B19;">底部</span></label>
            </div>
</div> 
<div class="it_option_set radio_option_set">
            <div class="it_option_header">广告选择</div>
            <div class="it_option">
            <input name="fo2_ad_1" type="checkbox" value="1" <?php if ($fo2_ad_1 == 1):?>checked<?php endif;?> ></input><label>顶部</label>
            <input name="fo2_ad_2" type="checkbox"  value="1" <?php if ($fo2_ad_2 == 1):?>checked<?php endif;?> ></input><label>中间</label>
            <input name="fo2_ad_3" type="checkbox" value="1" <?php if ($fo2_ad_3 == 1):?>checked<?php endif;?>  ></input><label>内容</label>
            <input name="fo2_ad_4" type="checkbox" value="1" <?php if ($fo2_ad_4 == 1):?>checked<?php endif;?>  ></input><label>底部</label>
            </div>
</div>
</div>
<div class="tabBodyItem">
<div class="it_option_set radio_option_set">
            <div class="it_option_header">首页幻灯片</div>
            <div class="it_option">
            <input name="silder" type="radio"  value="1" <?php if ($silder == "1") echo 'checked'?>></input><label><span style="color:green;">顶置</span></label>
            <input name="silder" type="radio"  value="2" <?php if ($silder == "2") echo 'checked'?>></input><label><span style="color:#B42B19;">自定义</span></label>
            <input name="silder" type="radio"  value="3" <?php if ($silder == "3") echo 'checked'?>></input><label><span style="color:#999;">隐藏</span></label>
            </div>
</div> 
<div class="it_option_set radio_option_set">
            <div class="it_option_header">幻灯分类</div>
            <div class="it_option">
            <input name="sortout" type="radio" value="1" <?php if ($sortout == "1") echo 'checked'?> ></input><label><span style="color:#1963B4;">开启</span></label>
            <input name="sortout" type="radio"  value="2" <?php if ($sortout  == "2") echo 'checked'?>></input><label><span style="color:#B42B19;">隐藏</span></label>
            </div>
</div> 
<div class="it_option_set radio_option_set">
        <div class="it_option_header">幻灯下调用分类ID</div>
        <div class="it_option">
         <input size="50"  name="sort_id" id="section_middle_label"  value="<?php $num = count($sort_id);for($i = 0; $i < $num; $i++){echo $sort_id[$i].",";}?>" >
         </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">第一个幻灯片名称</div>
        <div class="it_option">
        <input size="60"  name="sildcustom1" id="section_middle_label"  value="<?php echo $sildcustom1; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">幻灯片图片地址</div>
        <div class="it_option">
        <input size="60"  name="sildimg1" id="section_middle_label"  value="<?php echo $sildimg1; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">幻灯片链接</div>
        <div class="it_option">
        <input size="60"  name="sildurl1" id="section_middle_label"  value="<?php echo $sildurl1; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">第二个幻灯片名称</div>
        <div class="it_option">
        <input size="60"  name="sildcustom2" id="section_middle_label"  value="<?php echo $sildcustom2; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">幻灯片图片地址</div>
        <div class="it_option">
        <input size="60"  name="sildimg2" id="section_middle_label"  value="<?php echo $sildimg2; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">幻灯片链接</div>
        <div class="it_option">
        <input size="60"  name="sildurl2" id="section_middle_label"  value="<?php echo $sildurl2; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">第三个幻灯片名称</div>
        <div class="it_option">
        <input size="60"  name="sildcustom3" id="section_middle_label"  value="<?php echo $sildcustom3; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">幻灯片图片地址</div>
        <div class="it_option">
        <input size="60"  name="sildimg3" id="section_middle_label"  value="<?php echo $sildimg3; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">幻灯片链接</div>
        <div class="it_option">
        <input size="60"  name="sildurl3" id="section_middle_label"  value="<?php echo $sildurl3; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">第四个幻灯片名称</div>
        <div class="it_option">
        <input size="60"  name="sildcustom4" id="section_middle_label"  value="<?php echo $sildcustom4; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">幻灯片图片地址</div>
        <div class="it_option">
        <input size="60"  name="sildimg4" id="section_middle_label"  value="<?php echo $sildimg4; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">幻灯片链接</div>
        <div class="it_option">
        <input size="60"  name="sildurl4" id="section_middle_label"  value="<?php echo $sildurl4; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">第五个幻灯片名称</div>
        <div class="it_option">
        <input size="60"  name="sildcustom5" id="section_middle_label"  value="<?php echo $sildcustom5; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">幻灯片图片地址</div>
        <div class="it_option">
        <input size="60"  name="sildimg5" id="section_middle_label"  value="<?php echo $sildimg5; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">幻灯片链接</div>
        <div class="it_option">
        <input size="60"  name="sildurl5" id="section_middle_label"  value="<?php echo $sildurl5; ?>" >
        </div>
</div>
</div>
<div class="tabBodyItem">
<div class="it_option_set radio_option_set">
        <div class="it_option_header">自定义名一</div>
        <div class="it_option">
        <input size="50"  name="cusname" id="section_middle_label"  value="<?php echo $cusname; ?>" >
        </div>
</div>	
<div class="it_option_set radio_option_set">
        <div class="it_option_header">介绍描述</div>
        <div class="it_option">
        <textarea   name="about"  cols="70" rows="12"><?php echo $about; ?></textarea>
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">自定义名二</div>
        <div class="it_option">
        <input size="50"  name="cusnames" id="section_middle_label"  value="<?php echo $cusnames; ?>" >
        </div>
</div>	
<div class="it_option_set radio_option_set">
        <div class="it_option_header">联系人</div>
        <div class="it_option">
        <input size="50"  name="contact" id="section_middle_label"  value="<?php echo $contact; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">电话</div>
        <div class="it_option">
        <input size="50"  name="phone" id="section_middle_label"  value="<?php echo $phone; ?>" >
        </div>
</div>	
<div class="it_option_set radio_option_set">
        <div class="it_option_header">手机</div>
        <div class="it_option">
        <input size="50"  name="iphone" id="section_middle_label"  value="<?php echo $iphone; ?>" >
        </div>
</div>	 	          
<div class="it_option_set radio_option_set">
        <div class="it_option_header">邮箱</div>
        <div class="it_option">
        <input size="50"  name="cmail" id="section_middle_label"  value="<?php echo $cmail; ?>" >
        </div>
</div>	
<div class="it_option_set radio_option_set">
        <div class="it_option_header">地址</div>
        <div class="it_option">
        <input size="50"  name="address" id="section_middle_label"  value="<?php echo $address; ?>" >
        </div>
</div>	  
</div>
<div class="tabBodyItem">
<div class="it_option_set radio_option_set">
        <div class="it_option_header">论坛顶部</div>
        <div class="it_option">
        <input name="bbsout" type="radio" value="1" <?php if ($bbsout == "1") echo 'checked'?> ></input><label>4格模式</label>
        <input name="bbsout" type="radio"  value="2" <?php if ($bbsout == "2") echo 'checked'?>></input><label>幻灯片</label>
        <input name="bbsout" type="radio" value="3" <?php if ($bbsout == "3") echo 'checked'?> ></input><label>关闭</label>
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">第一个板块名称</div>
        <div class="it_option">
        <input size="50"  name="forumane1" id="section_middle_label"  value="<?php echo $forumane1; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">板块调用分类ID</div>
        <div class="it_option">
        <input size="50"  name="forumida" id="section_middle_label"  value="<?php $num = count($forumida);for($i = 0; $i < $num; $i++){echo $forumida[$i].",";}?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">第二个板块名称</div>
        <div class="it_option">
        <input size="50"  name="forumane2" id="section_middle_label"  value="<?php echo $forumane2; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">板块调用分类ID</div>
        <div class="it_option">
        <input size="50"  name="forumidb" id="section_middle_label"  value="<?php $num = count($forumidb);for($i = 0; $i < $num; $i++){echo $forumidb[$i].",";}?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">第三个板块名称</div>
        <div class="it_option">
        <input size="50"  name="forumane3" id="section_middle_label"  value="<?php echo $forumane3; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">板块调用分类ID</div>
        <div class="it_option">
        <input size="50"  name="forumidc" id="section_middle_label"  value="<?php $num = count($forumidc);for($i = 0; $i < $num; $i++){echo $forumidc[$i].",";}?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">第四个板块名称</div>
        <div class="it_option">
        <input size="50"  name="forumane4" id="section_middle_label"  value="<?php echo $forumane4; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">板块调用分类ID</div>
        <div class="it_option">
        <input size="50"  name="forumidd" id="section_middle_label"  value="<?php $num = count($forumidd);for($i = 0; $i < $num; $i++){echo $forumidd[$i].",";}?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">第四个板块名称</div>
        <div class="it_option">
        <input size="50"  name="forumane5" id="section_middle_label"  value="<?php echo $forumane5; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">板块调用分类ID</div>
        <div class="it_option">
        <input size="50"  name="forumide" id="section_middle_label"  value="<?php $num = count($forumide);for($i = 0; $i < $num; $i++){echo $forumide[$i].",";}?>" >
        </div>
</div>
</div>
<div class="tabBodyItem">
<div class="it_option_set radio_option_set">
        <div class="it_option_header">CMS分类ID</div>
        <div class="it_option">
        <input size="50"  name="cms_id" id="section_middle_label"  value="<?php $num = count($cms_id);for($i = 0; $i < $num; $i++){echo $cms_id[$i].",";}?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
            <div class="it_option_header">分类第一图片</div>
            <div class="it_option">
            <input name="cmsimg" type="radio" value="1" <?php if ($cmsimg == "1") echo 'checked'?> ></input><label><span style="color:#1963B4;">显示</span></label>
            <input name="cmsimg" type="radio"  value="2" <?php if ($cmsimg == "2") echo 'checked'?>></input><label><span style="color:#B42B19;">隐藏</span></label>
            </div>
</div>        
</div>
<div class="tabBodyItem">
<div class="it_option_set radio_option_set">
        <div class="it_option_header">tab选项</div>
        <div class="it_option">
        <input name="tabtools" type="radio" value="1" <?php if ($tabtools == "1") echo 'checked'?> ></input><label>启用</label>
        <input name="tabtools" type="radio"  value="2" <?php if ($tabtools== "2") echo 'checked'?>></input><label>禁用</label>
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">tab中广告</div>
        <div class="it_option">
        <textarea   name="tab_ad"  cols="70" rows="12"><?php echo $tab_ad; ?></textarea>
        </div>
</div>
	<div class="it_option_set radio_option_set">
        <div class="it_option_header">视频ID</div>
        <div class="it_option">
        <input size="50"  name="video_id" id="section_middle_label"  value="<?php $num = count($video_id);for($i = 0; $i < $num; $i++){echo $video_id[$i].",";}?>" >
        </div>
</div>	
<div class="it_option_set radio_option_set">
        <div class="it_option_header">视频采集</div>
        <div class="it_option">
        <input name="caiji" type="radio" value="1" <?php if ($caiji== "1") echo 'checked'?> disabled="disabled" ></input><label>启用</label>
        <input name="caiji" type="radio"  value="2" <?php if ($caiji== "2") echo 'checked'?>></input><label>禁用</label>
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">优酷解析</div>
        <div class="it_option">
        <input size="60"  name="customy" id="section_middle_label"  value="<?php echo $customy; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">QQ解析</div>
        <div class="it_option">
        <input size="60"  name="customq" id="section_middle_label"  value="<?php echo $customq; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">土豆解析</div>
        <div class="it_option">
        <input size="60"  name="customt" id="section_middle_label"  value="<?php echo $customt; ?>" >
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">Fun解析</div>
        <div class="it_option">
        <input size="60"  name="customf" id="section_middle_label"  value="<?php echo $customf; ?>" >
        </div>
</div>
</div>
<div class="tabBodyItem">
<div class="it_option_set radio_option_set">
        <div class="it_option_header">顶部广告</div>
        <div class="it_option">
        <textarea   name="fo3_ad"  cols="70" rows="12"><?php echo $fo3_ad; ?></textarea>
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">中间广告</div>
        <div class="it_option">
        <textarea  name="fo3_ad1"  cols="70" rows="12"><?php echo $fo3_ad1; ?></textarea>
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">底部广告</div>
        <div class="it_option">
        <textarea   name="fo3_ad2"  cols="70" rows="12"><?php echo $fo3_ad2; ?></textarea>
        </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">内容广告</div>
        <div class="it_option">
        <textarea   name="fo3_ad3"  cols="70" rows="12"><?php echo $fo3_ad3; ?></textarea>
        </div>
</div>
</div>
<div class="tabBodyItem">
<div class="it_option_set radio_option_set">
            <div class="it_option_header">FancyZoom</div>
            <div class="it_option">
            <input name="zoom" type="radio" value="1" <?php if ($zoom== "1") echo 'checked'?> ></input><label><span style="color:#1963B4;">启用</span></label>
            <input name="zoom" type="radio"  value="2" <?php if ($zoom== "2") echo 'checked'?>></input><label><span style="color:#B42B19;">禁用</span></label>
            </div> 
</div> 
<div class="it_option_set radio_option_set">
            <div class="it_option_header">源码压缩</div>
            <div class="it_option">
            <input name="compress_html" type="radio" value="1" <?php if ($compress_html == "1") echo 'checked'?> ></input><label><span style="color:#1963B4;">开启</span></label>
            <input name="compress_html" type="radio"  value="2" <?php if ($compress_html == "2") echo 'checked'?>></input><label><span style="color:#B42B19;">禁用</span></label>
            </div>
</div> 
<div class="it_option_set radio_option_set">
            <div class="it_option_header">头像缓存</div>
            <div class="it_option">
            <input name="xavatar" type="radio" value="1" <?php if ($xavatar== "1") echo 'checked'?> ></input><label><span style="color:#1963B4;">开启</span></label>
            <input name="xavatar" type="radio"  value="2" <?php if ($xavatar == "2") echo 'checked'?>></input><label><span style="color:#B42B19;">禁用</span></label>
            </div>
</div>
<div class="it_option_set radio_option_set">
            <div class="it_option_header">评论信息</div>
            <div class="it_option">
            <input name="useragent" type="radio" value="1" <?php if ($useragent == "1") echo 'checked'?> ></input><label><span style="color:#1963B4;">开启</span></label>
            <input name="useragent" type="radio"  value="2" <?php if ($useragent == "2") echo 'checked'?>></input><label><span style="color:#B42B19;">禁用</span></label>
            </div>
</div>  
<div class="it_option_set radio_option_set">
            <div class="it_option_header">瀑布流</div>
            <div class="it_option">
            <input name="waterfall" type="radio" value="1" <?php if ($waterfall== "1") echo 'checked'?> ></input><label><span style="color:#1963B4;">启用</span></label>
            <input name="waterfall" type="radio"  value="2" <?php if ($waterfall== "2") echo 'checked'?>></input><label><span style="color:#B42B19;">禁用</span></label>
            </div> 
</div> 
<div class="it_option_set radio_option_set">
            <div class="it_option_header">腾讯微博</div>
            <div class="it_option">
            <input size="50"  name="socialweibo" id="section_middle_label"  value="<?php echo $socialweibo; ?>" >
            </div>
</div>	
<div class="it_option_set radio_option_set">
        <div class="it_option_header">新浪微博</div>
        <div class="it_option">
         <input size="50"  name="socialsina" id="section_middle_label"  value="<?php echo $socialsina; ?>" >
         </div>
</div>
<div class="it_option_set radio_option_set">
        <div class="it_option_header">腾讯QQ</div>
        <div class="it_option">
         <input size="50"  name="qq" id="section_middle_label"  value="<?php echo $qq; ?>" >
         </div>
</div> 
</div>
<div class="tabBodyItem">
<article id="post-2985" class="post-2985 page type-page status-publish hentry">
	<header class="entry-header">
	<h1 class="entry-title"><i class="fa fa-heart"></i> 赞助支持</h1>
        </header>
<div class="entry-content">
<p style="text-align: center;">
<a href="<?php echo TEMPLATE_URL; ?>assets/images/donate.png" class="fancybox" data-fancybox-group="button" 2985="">
<img class="aligncenter"  src="<?php echo TEMPLATE_URL; ?>assets/images/donate.png" alt="" width="600" height="400" ></a>
</p>
<noscript><img class="aligncenter" src="<?php echo TEMPLATE_URL; ?>assets/images/donate.png" alt="" width="600" height="400" ></noscript>
<form id="alipayForm" accept-charset="GBK" action="https://shenghuo.alipay.com/send/payment/fill.htm" method="post" target="_blank">
<p style="text-align: center;"><span style="color: #ff0000; font-size: 14pt;"><strong>支付宝账户： 332819589@qq.com</strong></span></p>
<p>&nbsp;</p>
<p style="text-align: center;"><input height="37" name="pay" src="https://img.alipay.com/sys/personalprod/style/mc/btn-index.png" type="image" width="159"></p>
<p><input name="optEmail" type="hidden" value="huang.qiuquan@163.com"></p>
<p><input name="payAmount" type="hidden" value="10.00"></p>
<p><input id="title" name="title" type="hidden" value="赞助“Flyercn.ga”网站"></p>
<p><input name="memo" type="hidden" value="软件不错，特来支持站长！"></p>
</form>
</div>
</div>
</article>
</div>
</div>
<div clas="saves" style=" float:right; margin-top:11px"><input type="submit" value="保 存" class="button" /></div>
</form>
<?php else:?>
<?php header("Location:".BLOG_URL.""); exit;?>
<?php endif; ?>
