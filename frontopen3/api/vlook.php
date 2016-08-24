<?php
$vlook2='/createPlayer\(\'(.*?)\'/';
preg_match($vlook2, G(), $down);
header("location:$down[1]");  //此处是跳转  ，你也可以直接输出地址 echo $down[1];
function G(){
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,'http://www.vlook.cn/show/qs/'.$_GET['vid']);curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_REFERER,'http://www.vlook.cn/show/qs/YklkPTM1NTI0ODc=');curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,30);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (iPad; CPU OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5376e Safari/8536.25');curl_setopt($ch,CURLOPT_HEADER,0);
@ $file=curl_exec($ch);curl_close($ch);return $file;}
?>