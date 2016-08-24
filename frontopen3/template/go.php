<?php 
$t_url = preg_replace('/^url=(.*)$/i','$1',$_SERVER["QUERY_STRING"]);
if(!empty($t_url)) {
	preg_match('/(http|https):\/\//',$t_url,$matches);
	if($matches){
		$url=$t_url;
		$title='页面加载中,请稍候...';
	} else {
		$title='加载中...';
		echo "<script>setTimeout(function(){window.opener=null;window.close();}, 3000);</script>";
	}
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="1;url='<?php echo $url;?>';">
<title><?php echo $title;?></title>
<style type="text/css">
body {
	background: #555
}
.loading {
	-webkit-animation: fadein 2s;
	-moz-animation: fadein 2s;
	-o-animation: fadein 2s;
	animation: fadein 2s
}
@-moz-keyframes fadein {
	from {
		opacity: 0
	}
	to {
		opacity: 1
	}
}
@-webkit-keyframes fadein {
	from {
		opacity: 0
	}
	to {
		opacity: 1
	}
}
@-o-keyframes fadein {
	from {
		opacity: 0
	}
	to {
		opacity: 1
	}
}
@keyframes fadein {
	from {
		opacity: 0
	}
	to {
		opacity: 1
	}
}
.spinner-wrapper {
	position: absolute;
	top: 0;
	left: 0;
	z-index: 300;
	height: 100%;
	min-width: 100%;
	min-height: 100%;
	background: rgba(255,255,255,0.93)
}
.spinner-text {
	position: absolute;
	top: 45%;
	left: 50%;
	margin-left: -100px;
	margin-top: 2px;
	color: #000;
	letter-spacing: 1px;
	font-size: 20px;
	font-family: Arial
}
.spinner {
	position: absolute;
	top: 45%;
	left: 50%;
	display: block;
	margin-left: -160px;
	width: 1px;
	height: 1px;
	border: 20px solid rgba(255,0,0,1);
	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;
	border-left-color: transparent;
	border-right-color: transparent;
	-webkit-animation: spin 1.5s infinite;
	-moz-animation: spin 1.5s infinite;
	animation: spin 1.5s infinite
}
@-webkit-keyframes spin {
	0%,100% {
		-webkit-transform: rotate(0deg) scale(1)
	}
	50% {
		-webkit-transform: rotate(720deg) scale(0.6)
	}
}
@-moz-keyframes spin {
	0%,100% {
		-moz-transform: rotate(0deg) scale(1)
	}
	50% {
		-moz-transform: rotate(720deg) scale(0.6)
	}
}
@-o-keyframes spin {
	0%,100% {
		-o-transform: rotate(0deg) scale(1)
	}
	50% {
		-o-transform: rotate(720deg) scale(0.6)
	}
}
@keyframes spin {
	0%,100% {
		transform: rotate(0deg) scale(1)
	}
	50% {
		transform: rotate(720deg) scale(0.6)
	}
}
</style>
</head>
<body>
<div class="loading">
  <div class="spinner-wrapper">
    <span class="spinner-text">页面加载中，请稍候...</span>
    <span class="spinner"></span>
  </div>
</div>
</body>
</html>