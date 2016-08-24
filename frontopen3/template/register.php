<?php

session_start();
!defined('EMLOG_ROOT') && exit('access deined!');
 if(ROLE == 'admin' || ROLE == 'writer'){header('Location:'.BLOG_URL.'admin/');}
global $CACHE;
$options_cache = $CACHE->readCache('options');
$DB = MySql::getInstance();
$username = isset($_POST['username']) ? addslashes(trim($_POST['username'])) : '';
$password = isset($_POST['password']) ? addslashes(trim($_POST['password'])) : '';
$password2 = isset($_POST['password2']) ? addslashes(trim($_POST['password2'])) : '';
$imgcode = isset($_POST['imgcode']) ? strtoupper(addslashes(trim($_POST['imgcode']))): '';
if($username && $password && $password2 && $imgcode ){
$sessionCode = isset($_SESSION['code']) ? $_SESSION['code'] : '';
//echo $sessionCode;
if($imgcode == $sessionCode){
$User_Model = new User_Model();
if(!$User_Model -> isUserExist($username)){
$hsPWD = new PasswordHash(8, true);
$password = $hsPWD->HashPassword($password);
$User_Model->addUser($username, $password, 'writer', 'y');
$CACHE->updateCache();
echo'<script>alert("注册成功！"); window.location.href="'.BLOG_URL.'admin/"</script>';
}else{echo'<script>alert("用户名已存在！");</script>';}
}else{echo'<script>alert("验证码错误！");</script>';}}
?>
<script type="text/javascript">
function checkReg(){
var usrName = $("input[name=username]").val().replace(/(^\s*)|(\s*$)/g, "");
var pwd = $("input[name=password]").val().replace(/(^\s*)|(\s*$)/g, "");
var pwd2 = $("input[name=password2]").val().replace(/(^\s*)|(\s*$)/g, "");
var yzm = $("input[name=imgcode]").val().replace(/(^\s*)|(\s*$)/g, "");
if(usrName.match(/\s/) || pwd.match(/\s/)){alert("用户名和密码中不能有空格");return false;}
if(usrName == '' || pwd == '' || yzm == ''){alert("用户名、密码、验证码都不能为空！");return false;}
if(usrName.length < 5 || pwd.length < 5){alert("用户名和密码都不能小于5位！");return false;}
else if(pwd != pwd2){alert("两次输入密码不相等！");return false;}
}
$(function(){$("#imginfo").click(function(){
//alert('haha');
$("img#yzcode").attr("src", "<?php echo BLOG_URL;?>include/lib/checkcode.php?"+Math.random());
});
})
</script>


?>