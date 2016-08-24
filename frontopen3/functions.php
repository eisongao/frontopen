<?php
/*
 * @frontopen3 附加函数库文件
 * @authors Flyer
 * @date    2016-8-20
 * @version 1.0
 */
if(!defined('EMLOG_ROOT')) {exit('Everbox Functions Requrire Emlog!');}
define('E_VERSION','1.0');
	$nonce_templet = Option::get('nonce_templet');
	$nonceTplData = @implode('', @file(TPLS_PATH.$nonce_templet.'/header.php'));
	preg_match("/Template Name:(.*)/i", $nonceTplData, $tplName);
	preg_match("/Version:(.*)/i", $nonceTplData, $tplVersion);
        $tplVer = !empty($tplVersion[1]) ? $tplVersion[1] : '';
	$tplName = !empty($tplName[1]) ? trim($tplName[1]) : $nonce_templet;
	function DeleteHtml($str) { $str = trim($str); $str = strip_tags($str,"");$str = ereg_replace("t","",$str);$str = ereg_replace    ("rn","",    $str); $str = ereg_replace("r","",$str); $str = ereg_replace("n","",$str); $str = ereg_replace(" "," ",$str);    return trim($str); } 
	$tplVer=DeleteHtml($tplVer);
/**
 * @des 主题控制中心
 */
function plugin_setting(){
	$do = isset($_GET['do']) ? $_GET['do'] : '';
if ($do == 'update') {
	} elseif($do == 'save') {
	 $logo = isset($_POST['logo']) ? addslashes(trim($_POST['logo'])) : '';
         $layout = isset($_POST['layout']) ? addslashes(trim($_POST['layout'])) : '';
	 $style = isset($_POST['style']) ? addslashes(trim($_POST['style'])) : '';
	 $welcome = isset($_POST['welcome']) ? addslashes(trim($_POST['welcome'])) : '';
	 $social = isset($_POST['social']) ? addslashes(trim($_POST['social'])) : '';
         $fenlei = isset($_POST['fenlei']) ? addslashes(trim($_POST['fenlei'])) : '';
         $silder = isset($_POST['silder']) ? addslashes(trim($_POST['silder'])) : '';
	 $fo2_ad_1 = isset($_POST['fo2_ad_1']) ? trim($_POST['fo2_ad_1']) : '';
         $fo2_ad_2 = isset($_POST['fo2_ad_2']) ? trim($_POST['fo2_ad_2']) : '';
	 $fo2_ad_3 = isset($_POST['fo2_ad_3']) ? trim($_POST['fo2_ad_3']) : '';
         $fo2_ad_4 = isset($_POST['fo2_ad_4']) ? trim($_POST['fo2_ad_4']) : '';
	 $fo2_ad = isset($_POST['fo2_ad']) ? trim($_POST['fo2_ad']) : '';
	 $fo3_ad= isset($_POST['fo3_ad']) ? trim($_POST['fo3_ad']) : '';
         $fo3_ad1= isset($_POST['fo3_ad1']) ? trim($_POST['fo3_ad1']) : '';
	 $fo3_ad2= isset($_POST['fo3_ad2']) ? trim($_POST['fo3_ad2']) :  '';     
         $fo3_ad3= isset($_POST['fo3_ad3']) ? trim($_POST['fo3_ad3']) : '';
	 $fo3_ad4= isset($_POST['fo3_ad4']) ? trim($_POST['fo3_ad4']) : '';
	 $compress_html= isset($_POST['compress_html']) ? trim($_POST['compress_html']) : '';
	 $tab_ad= isset($_POST['tab_ad']) ? trim($_POST['tab_ad']) : '';
	 $zoom= isset($_POST['zoom']) ? trim($_POST['zoom']) : '';
         $thm = isset($_POST['thm']) ? addslashes(trim($_POST['thm'])) : '';
	 $top = isset($_POST['top']) ? addslashes(trim($_POST['top'])) : '';
	 $topbar = isset($_POST['topbar']) ? addslashes(trim($_POST['topbar'])) : '';
         $sortout  = isset($_POST['sortout']) ? addslashes(trim($_POST['sortout'])) : '';
	 $sildcustom1 = isset($_POST['sildcustom1']) ? addslashes(trim($_POST['sildcustom1'])) : '';
         $sildcustom2 = isset($_POST['sildcustom2']) ? addslashes(trim($_POST['sildcustom2'])) : '';
         $sildcustom3 = isset($_POST['sildcustom3']) ? addslashes(trim($_POST['sildcustom3'])) : '';
	 $sildcustom4 = isset($_POST['sildcustom4']) ? addslashes(trim($_POST['sildcustom4'])) : '';
         $sildcustom5 = isset($_POST['sildcustom5']) ? addslashes(trim($_POST['sildcustom5'])) : '';
	 $sildurl1 = isset($_POST['sildurl1']) ? addslashes(trim($_POST['sildurl1'])) : '';
         $sildurl2 = isset($_POST['sildurl2']) ? addslashes(trim($_POST['sildurl2'])) : '';
         $sildurl3 = isset($_POST['sildurl3']) ? addslashes(trim($_POST['sildurl3'])) : '';
	 $sildurl4 = isset($_POST['sildurl4']) ? addslashes(trim($_POST['sildurl4'])) : '';
         $sildurl5 = isset($_POST['sildurl5']) ? addslashes(trim($_POST['sildurl5'])) : '';
         $sildimg1 = isset($_POST['sildimg1']) ? addslashes(trim($_POST['sildimg1'])) : '';
         $sildimg2 = isset($_POST['sildimg2']) ? addslashes(trim($_POST['sildimg2'])) : '';
         $sildimg3 = isset($_POST['sildimg3']) ? addslashes(trim($_POST['sildimg3'])) : '';
         $sildimg4 = isset($_POST['sildimg4']) ? addslashes(trim($_POST['sildimg4'])) : '';
         $sildimg5 = isset($_POST['sildimg5']) ? addslashes(trim($_POST['sildimg5'])) : '';
	 $sort_id = isset($_POST['sort_id']) ? addslashes(trim($_POST['sort_id'])) : '';
         $forumane1 = isset($_POST['forumane1']) ? addslashes(trim($_POST['forumane1'])) : '';
         $forumane2 = isset($_POST['forumane2']) ? addslashes(trim($_POST['forumane2'])) : '';
         $forumane3 = isset($_POST['forumane3']) ? addslashes(trim($_POST['forumane3'])) : '';
	 $forumane4 = isset($_POST['forumane4']) ? addslashes(trim($_POST['forumane4'])) : '';
	 $forumane5 = isset($_POST['forumane5']) ? addslashes(trim($_POST['forumane5'])) : '';
         $forumida = isset($_POST['forumida']) ? addslashes(trim($_POST['forumida'])) : '';
         $forumidb = isset($_POST['forumidb']) ? addslashes(trim($_POST['forumidb'])) : '';
         $forumidc = isset($_POST['forumidc']) ? addslashes(trim($_POST['forumidc'])) : '';		 
	 $forumidd = isset($_POST['forumidd']) ? addslashes(trim($_POST['forumidd'])) : '';		 
	 $forumide = isset($_POST['forumide']) ? addslashes(trim($_POST['forumide'])) : '';		 
         $bbsout = isset($_POST['bbsout']) ? addslashes(trim($_POST['bbsout'])) : '';
         $video = isset($_POST['video']) ? addslashes(trim($_POST['video'])) : '';
         $sidebar = isset($_POST['sidebar']) ? addslashes(trim($_POST['sidebar'])) : '';
         $cusname = isset($_POST['cusname']) ? addslashes(trim($_POST['cusname'])) : '';
         $cusnames = isset($_POST['cusnames']) ? addslashes(trim($_POST['cusnames'])) : '';
         $about = isset($_POST['about']) ? addslashes(trim($_POST['about'])) : '';
         $contact = isset($_POST['contact']) ? addslashes(trim($_POST['contact'])) : '';
         $phone = isset($_POST['phone']) ? addslashes(trim($_POST['phone'])) : '';
         $iphone = isset($_POST['iphone']) ? addslashes(trim($_POST['iphone'])) : '';
         $cmail = isset($_POST['cmail']) ? addslashes(trim($_POST['cmail'])) : '';
         $customy = isset($_POST['customy']) ? addslashes(trim($_POST['customy'])) : '';
         $customq = isset($_POST['customq']) ? addslashes(trim($_POST['customq'])) : '';
         $customf = isset($_POST['customf']) ? addslashes(trim($_POST['customf'])) : '';
         $customt = isset($_POST['customt']) ? addslashes(trim($_POST['customt'])) : '';
         $address = isset($_POST['address']) ? addslashes(trim($_POST['address'])) : '';
	 $cms_id = isset($_POST['cms_id']) ? addslashes(trim($_POST['cms_id'])) : '';
	 $video_id = isset($_POST['video_id']) ? addslashes(trim($_POST['video_id'])) : '';
	 $cmsimg = isset($_POST['cmsimg']) ? addslashes(trim($_POST['cmsimg'])) : '';
	 $tabtools = isset($_POST['tabtools']) ? addslashes(trim($_POST['tabtools'])) : '';	 
         $socialsina= isset($_POST['socialsina']) ? addslashes(trim($_POST['socialsina'])) : '';
         $qq = isset($_POST['qq']) ? addslashes(trim($_POST['qq'])) : '';
	 $socialweibo = isset($_POST['socialweibo']) ? addslashes(trim($_POST['socialweibo'])) : '';
	 $xavatar= isset($_POST['xavatar']) ? addslashes(trim($_POST['xavatar'])) : '';
	 $waterfall= isset($_POST['waterfall']) ? addslashes(trim($_POST['waterfall'])) : '';
	 $useragent= isset($_POST['useragent']) ? addslashes(trim($_POST['useragent'])) : '';
 	 $caiji= isset($_POST['caiji']) ? addslashes(trim($_POST['caiji'])): '';	 
$data = "<?php
	 \$logo = '".$logo."';
	 \$layout = '".$layout."';
	 \$style = '".$style."';
	 \$welcome = '".$welcome."';				 
	 \$social = '".$social."';				 
         \$fenlei = '".$fenlei."';
         \$silder = '".$silder."';				 
	 \$fo2_ad = '".$fo2_ad."';
         \$fo2_ad_1 = '".$fo2_ad_1."';
	 \$fo2_ad_2 = '".$fo2_ad_2."';
	 \$fo2_ad_3 = '".$fo2_ad_3."';
         \$fo2_ad_4 = '".$fo2_ad_4."';
	 \$fo3_ad = '".$fo3_ad."';
	 \$fo3_ad1 = '".$fo3_ad1."';
         \$fo3_ad2 = '".$fo3_ad2."';
	 \$fo3_ad3 = '".$fo3_ad3."';
	 \$fo3_ad4 = '".$fo3_ad4."';
	 \$compress_html = '".$compress_html."';
	 \$tab_ad = '".$tab_ad."';
	 \$zoom = '".$zoom."';
         \$thm = '".$thm."';
         \$top = '".$top."';
	 \$topbar = '".$topbar."';
         \$sortout  = '".$sortout ."';				 
         \$sildurl1 = '".$sildurl1."';
         \$sildurl2 = '".$sildurl2."';
         \$sildurl3 = '".$sildurl3."';
	 \$sildurl4 = '".$sildurl4."';
         \$sildurl5 = '".$sildurl5."';
         \$sildcustom1 = '".$sildcustom1."';
         \$sildcustom2 = '".$sildcustom2."';
         \$sildcustom3 = '".$sildcustom3."';
         \$sildcustom4 = '".$sildcustom4."';
         \$sildcustom5 = '".$sildcustom5."';
         \$sildimg1 = '".$sildimg1."';
         \$sildimg2 = '".$sildimg2."';
         \$sildimg3 = '".$sildimg3."';
         \$sildimg4 = '".$sildimg4."';
         \$sildimg5 = '".$sildimg5."';
	 \$sort_id =array(".$sort_id.");
         \$forumane1 = '".$forumane1."';
         \$forumane2 = '".$forumane2."';
         \$forumane3 = '".$forumane3."';				 
         \$forumane4 = '".$forumane4."';				 
         \$forumane5 = '".$forumane5."';				 
         \$forumida =array(".$forumida.");
         \$forumidb = array(".$forumidb.");
         \$forumidc = array(".$forumidc.");					 
         \$forumidd = array(".$forumidd.");					 
         \$forumide = array(".$forumide.");					 
	 \$bbsout = '".$bbsout."';
	 \$video = '".$video."';
	 \$sidebar = '".$sidebar."';
	 \$cusname = '".$cusname."';
	 \$cusnames = '".$cusnames."';
	 \$contact = '".$contact."';
	 \$phone = '".$phone."';
	 \$iphone = '".$iphone."';
	 \$cmail = '".$cmail."';
	 \$customy = '".$customy."';
	 \$customq = '".$customq."';
	 \$customf = '".$customf."';
	 \$customt = '".$customt."';
	 \$address = '".$address."';
	 \$about = '".$about."';
	 \$cms_id =array(".$cms_id.");
	 \$video_id =array(".$video_id.");
	 \$cmsimg ='".$cmsimg."';
	 \$tabtools ='".$tabtools."';
	 \$caiji='".$caiji."';	 
         \$socialweibo='".$socialweibo."';
	 \$socialsina ='".$socialsina."';
	 \$qq ='".$qq."';
	 \$xavatar='".$xavatar."';
	 \$waterfall='".$waterfall."';
	 \$useragent='".$useragent."';
?>";
		$file = EMLOG_ROOT.'/content/templates/frontopen3/config.php';
		@ $fp = fopen($file, 'wb') OR emMsg('读取文件失败，如果您使用的是Unix/Linux主机，请修改文件/content/templates/frontopen3/config.php的权限为777。如果您使用的是Windows主机，请联系管理员，将该文件设为everyone可写');
		@ $fw =	fwrite($fp,$data) OR emMsg('写入文件失败，如果您使用的是Unix/Linux主机，请修改文件/content/templates/frontopen3/config.php的权限为777。如果您使用的是Windows主机，请联系管理员，将该文件设为everyone可写');
		fclose($fp);
		header("Location: ".BLOG_URL."?action=setting=true");
		}
}